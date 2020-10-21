<?php

namespace Gurpreetsinghin\VaultsSecurity\Seeds;

use Illuminate\Database\Seeder;
use DB;
use Gurpreetsinghin\VaultsSecurity\Traits\Config;

class DatabaseSeeder extends Seeder
{

    use Config;

    public function run()
    {
        // $this->sqli_settings();
        // $this->badbot_settings();
        // $this->proxy_settings();
        // $this->spam_settings();
        // $this->dnsbl_databases();
        $this->adblocker_settings();
    }

    public function sqli_settings(){
        DB::table($this->prefix().'sqli-settings')->insert([
            'protection'    => 1,
            'protection2'   => 1,
            'protection3'   => 1,
            'protection4'   => 1,
            'protection5'   => 0,
            'protection6'   => 1,
            'protection7'   => 0,
            'protection8'   => 0,
            'logging'       => 1,
            'redirect'      => '',
            'autoban'       => 0,
            'mail'          => 0,
        ]);
    }

    public function badbot_settings(){
        DB::table($this->prefix().'badbot-settings')->insert([
            'protection'    => 1,
            'protection2'   => 1,
            'protection3'   => 1,
            'logging'       => 1,
            'autoban'       => 0,
            'mail'          => 0,
        ]);
    }

    public function proxy_settings(){
        DB::table($this->prefix().'proxy-settings')->insert([
            'protection'    => 1,
            'protection2'   => 1,
            'protection3'   => 1,
            'api1'          => '',
            'api2'          => '',
            'api3'          => '',
            'logging'       => 1,
            'autoban'       => 0,
            'redirect'      => '',
            'mail'          => 0,
        ]);
    }

    public function spam_settings(){
        $check = $this->check($this->prefix().'spam-settings');

        if($check == 0){
            DB::table($this->prefix().'spam-settings')->insert([
                'protection'    => 0,
                'logging'       => 1,
                'autoban'       => 0,
                'redirect'      => '',
                'mail'          => 0,
            ]);
        }
    }

    public function dnsbl_databases(){
        DB::table($this->prefix().'dnsbl-databases')->insert([
            [
                'database'    => 'sbl.spamhaus.org'
            ],[
                'database'    => 'xbl.spamhaus.org'
            ]
        ]);
    }

    public function adblocker_settings(){
        $check = $this->check($this->prefix().'adblocker-settings');

        if($check == 0){
            DB::table($this->prefix().'adblocker-settings')->insert([
                'detection'    => 0,
                'redirect'      => ''
            ]);
        }
    }

    public function check($db){
        $data = DB::table($db)->count();
        return $data;
    }

}

?>