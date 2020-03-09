<?php

namespace App\Console\Commands;

use App\ApState;
use Illuminate\Console\Command;

class CountItem extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'count:item';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Count Item based on State';

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
        $datas = [];
        $result_data = [];
        $items = ['steak', 'grnd_beef', 'sausage', 'fry_chick', 'tuna'];
        $state_names = ApState::get('state')->toArray();
        $state_array = json_decode(json_encode($state_names), true);
        foreach ($state_array as $key => $array) {
            $state_name = $array['state'];

            foreach ($items as $item) {
                $average_count = $this->storeData($state_name, $item, $datas);
                if (array_key_exists($state_name, $result_data)) {
                    $result_data[$state_name] .= ' ' . ucfirst(str_replace("_", " ", $average_count));

                } else {
                    $result_data[$state_name] = ucfirst(str_replace("_", " ", $average_count));
                }

            }

        }

        // dd($result_data);
        $this->beautifyResult($result_data);

        //print(print_r($result_data, true));

    }

    private function storeData($state_name, $item, $datas)
    {
        $item_name = \DB::select(\DB::raw("SELECT AVG($item) as ag FROM ap_copis WHERE state= '$state_name'"));
        return $item . '(' . $item_name[0]->ag . ')';
    }

    private function beautifyResult($result_data)
    {
        foreach ($result_data as $key => $r) {
            echo $key;
            echo " : ";
            echo $result_data[$key] . "\n";
        }
    }

}
