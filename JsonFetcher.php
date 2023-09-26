<?php


class JsonFetcher
{
    private string $link;

    public function __construct(string $link)
    {
        $this->link = $link;
    }

    public function get($path = "")
    {
        $curlLink = $this->link . $path;
        $ch = curl_init($curlLink);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }

    public function post($payload = [])
    {
        $ch = curl_init($this->link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }

    public function update($path = "", $payload = [])
    {
        $ch = curl_init($this->link . $path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }

    public function delete($path = "")
    {
        $ch = curl_init($this->link . $path);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }
}