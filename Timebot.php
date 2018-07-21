<?php

    class Timebot{
        private $set_date,
                $current_dateTime,
                $date_create,
                $defaultZone;

        public function startBot($date, $interval = null){
            
            $this->set_date = $date;
            $create_date = $this->create_date($this->set_date, $this->currentTime());
            $this->dateInterval($create_date, $interval);
            return $create_date->format($this->dateFormat());
        }

        public function endBot($interval = null){
            $this->set_date = $this->currentDate_Time();
            $create_date = $this->create_date($this->set_date);
            $this->dateInterval($create_date, $interval);
            return $create_date->format($this->dateFormat());
        }

        public function startBan($date, $interval = null){
            return $this->startBot($date, $interval);
        }
        public function endBan($interval = null){
            return $this->endBot($interval);
        }

        private function dateFormat(){
            return "Y-m-d H:i:s";
        }

        private function currentTime(){
            return date("H:i:s");
        }

        private function currentDate_Time(){
            return date("Y-m-d H:i:s");
        }

        private function create_date($date, $time = null){
            return date_create($date." ".$time);
        }

        public function dateInterval($create_date, $interval){
            return date_add($create_date, date_interval_create_from_date_string($interval));
        }

        public function setDefaultDateZone($zone){
            $this->defaultZone = date_default_timezone_set($zone);
        }
    }

    $autobot = new Timebot();
    $autobot->setDefaultDateZone("Africa/Lagos");
    
    if($autobot->startBan(date("Y-m-d"), "3days") > $autobot->endBan()){
        echo "wont delete";
    } else {
        echo "deleted";
    }
