<?php

class sql_ip extends database {

    protected $tabel = "ip";
    protected $prop = array("id", "ip", "date");

    public function group($var) {
        $sql = "SELECT $var, COUNT($this->id) AS antal FROM $this->tabel GROUP BY $var";
        $result = $this->myconn->query($sql);
        $array = array();
        while ($row = $result->fetch_object()) {
            $array[$row->$var] = $row->antal;
        }
        return $array;
    }

    public function setIp($ip) {
        $this->objprop["ip"] = $ip;
    }
    public function getIp() {
        return $this->objprop["ip"];
    }

    //new set of public function

    public function setDate($ipDate) {
        $this->objprop['date'] = $ipDate;
    }
    public function getDate() {
        return $this->objprop['date'];
    }

    //new set of public function
}
