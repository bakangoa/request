<?php

    namespace Goa\Http\Base;

    class Request
    {

        /**
         * Send a http GET request
         * @param String $url Where to send the request
         * @param $data What to send
         * @param Array $httpheader Hearders to attach to the request
         * @param bool $json If response must be decoded json
         * @return $response Data from the response and null if something wrong
         */
        public static function get(String $url, $data = [], Array $httpheaders = [], bool $json = true)
        {
            try {
                $curl = curl_init();

                if (!empty($data))
                {
                    $url = $url . "?" . http_build_query($data);
                }

                $options = [
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => $httpheaders
                ];

                curl_setopt_array($curl, $options);

                $response = curl_exec($curl);

                curl_close($curl);

                if ($json)
                {
                    return json_decode($response);
                }

                return $response;
            } catch (\Exception $e) {
                error_log($e->getMessage());
                return null;
            }
            
        }

        /**
         * Send a http POST request
         * @param String $url Where to send the request
         * @param $data What to send
         * @param Array $httpheader Hearders to attach to the request
         * @param bool $json If response must be decoded json
         * @return $response Data from the response and null if something wrong
         */
        public static function post(String $url, $data, Array $httpheaders = [], bool $json = true)
        {
            try {
                $curl = curl_init();

                $options = [
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => $httpheaders,
                    CURLOPT_POSTFIELDS => $data
                ];

                curl_setopt_array($curl, $options);

                $response = curl_exec($curl);

                curl_close($curl);

                if ($json)
                {
                    return json_decode($response);
                }

                return $response;
            } catch (\Exception $e) {
                error_log($e->getMessage());
                return null;
            }
            
        }

        /**
         * Send a http PUT request
         * @param String $url Where to send the request
         * @param $id The id of the ressource
         * @param $data What to send
         * @param Array $httpheader Hearders to attach to the request
         * @param bool $json If response must be decoded json
         * @return $response Data from the response and null if something wrong
         */
        public static function put(String $url, $id, $data, Array $httpheaders = [], bool $json = true)
        {
            try {
                $curl = curl_init();

                $options = [
                    CURLOPT_URL => trim($url) . "/" . $id,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => $httpheaders,
                    CURLOPT_POSTFIELDS => http_build_query($data),
                    CURLOPT_CUSTOMREQUEST => 'PUT'
                ];

                curl_setopt_array($curl, $options);

                $response = curl_exec($curl);

                curl_close($curl);

                if ($json)
                {
                    return json_decode($response);
                }

                return $response;
            } catch (\Exception $e) {
                error_log($e->getMessage());
                return null;
            }
            
        }

        /**
         * Send a http DELETE request
         * @param String $url Where to send the request
         * @param $id The id of the ressource
         * @param Array $httpheader Hearders to attach to the request
         * @param bool $json If response must be decoded json
         * @return $response Data from the response and null if something wrong
         */
        public static function delete(String $url, $id, Array $httpheaders = [], bool $json = true)
        {
            try {
                $curl = curl_init();

                $options = [
                    CURLOPT_URL => trim($url) . "/" . $id,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => $httpheaders,
                    CURLOPT_CUSTOMREQUEST => 'DELETE'
                ];

                curl_setopt_array($curl, $options);

                $response = curl_exec($curl);

                curl_close($curl);

                if ($json)
                {
                    return json_decode($response);
                }

                return $response;
            } catch (\Exception $e) {
                error_log($e->getMessage());
                return null;
            }
            
        }

    }
    

?>