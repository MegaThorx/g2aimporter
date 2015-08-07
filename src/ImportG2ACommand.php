<?php

namespace Zborowski\G2aimport;

use Illuminate\Console\Command;
use DB;

class ImportG2ACommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'g2a:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports G2A website into local database.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $max = $this->getG2AProductCount();
        for ($i=0; $i < $max; $i++) {
            $item = $this->getG2AData($i);
            $keys = [];
            $values = [];
            $arr = [];
            foreach ($item as $key => $value) {
                array_push($keys,$key);
                array_push($values,$value);
                array_push($arr,"?");
            }
            DB::insert("insert into products (".implode(",",$keys).") values (".implode(",",$arr).")", $values);
        }
    }

    public function getG2AData($start){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://www.g2a.com/lucene/search/filter?&minPrice=0&maxPrice=999&cn=&stock=all&event=&platform=0&genre=0&sortOrder=default+desc&start=".$start."&rows=1&_=1436640468821");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_VERBOSE, 1);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      $response = json_decode(curl_exec($ch));
      $data = $response->docs;
      $data = $data[0];
      curl_close($ch);
      foreach ($data as $key => $value) {
          if(is_array($value)){
              $data->{$key} = implode(",",$value);
          }
      }
      return $data;
  }
  public function getG2AProductCount(){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://www.g2a.com/lucene/search/filter?&minPrice=0&maxPrice=999&cn=&stock=all&event=&platform=0&genre=0&sortOrder=default+desc&start=0&rows=1&_=1436640468821");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_VERBOSE, 1);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      $response = json_decode(curl_exec($ch));
      curl_close($ch);
      return $response->numFound;
  }
}
