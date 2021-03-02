<?php

namespace App\ApiSchema;

use Illuminate\Support\Facades\Http;

abstract class AbstractAPIParser implements iAPISchema
{
    protected $URL = '';
    protected $latestResponse = null;
    protected $payloadData = [];
    protected $fetched = false;

    /** Run the call and extract the data.
     * @return mixed
     */
    public function fetch($singlePageId = null)
    {
        $response = Http::get($this->URL, ['page' => empty($singlePageId) ? 1 : $singlePageId])->object();
        $this->ingestPayloadData($response);

        if (empty($singlePageId) && $this->isResponseList()) {
            while ($this->getCurrentPage() < $this->getTotalPages()) {
                $response = Http::get($this->URL, ['page' => $this->getCurrentPage() + 1])->object();
                $this->ingestPayloadData($response);
            }
        }

        $this->fetched = true;
        return $this;
    }

    /** Extract returns the dataset the APIParser has ingested
     * @return mixed
     */
    public function getPayloadData()
    {
        return $this->payloadData;
    }

    /** Returns wether call yields a single item or index (usually paginated)
     * @return mixed
     */
    public function isResponseList(){
        return is_array($this->latestResponse->data);
    }

    /** Extract data from current call result (paginated or not, i.e. single node)
     * @param $response
     */
    protected function ingestPayloadData(&$response){
        $this->latestResponse = $response;
        if (!$this->isResponseList()) {
            $this->payloadData = array_merge($this->payloadData, [$response->data]);
        }
        else {
            $this->payloadData = array_merge($this->payloadData, $response->data);
        }
    }

    public function isFetched(){
        return $this->fetched;
    }

    /** Class specific implementation
     * @return mixed
     */
    abstract function getTotalEntities();

    /** Class specific implementation
     * @return mixed
     */
    abstract function getTotalPages();

    /** Class specific implementation
     * @return mixed
     */
    abstract function getCurrentPage();


}
