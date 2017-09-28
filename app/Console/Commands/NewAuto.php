<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use News;
use Illuminate\Support\Facades\Auth;
use App\Library\simple_html_dom_node;
use App\Library\simple_html_dom;
use App\Library\Simple_html_func;

class NewAuto extends Command 
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $name = 'newauto:everyHour';
    protected $description = 'Command description';

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
        $i = 0;
        $id_catchild = 1;
        $id_cat = 1;
        $status = 1;
        $arUser = Auth::user();
        //lấy tin
        $obj = new Simple_html_func();
        $linkname = "http://vnexpress.net/rss/oto-xe-may.rss";
        $html = $obj->file_get_html($linkname);
        
        foreach($html->find('item description') as $element){
            $abc = explode('"', $element->innertext);
            $arHinh = explode('.', $abc[3]);
            $duoifile = end($arHinh);
            if($arHinh[3] == 'vnecdn'){
                $tenhinhmoi = explode('/',$arHinh[4]);

            }elseif($arHinh[1] == 'vnecdn'){
                $tenhinhmoi = explode('/',$arHinh[2]);
            }elseif($arHinh[2] == 'vnecdn'){
                $tenhinhmoi = explode('/',$arHinh[3]);
            }
            
            $newname = end($tenhinhmoi) . '.' . $duoifile;
            $tmp_name = $abc[3];
            $path_upload = $_SERVER['DOCUMENT_ROOT'].'/storage/app/files/'.$newname;
            
            $item['picture'] = $newname;
            $preview = explode('>', $abc[4]);
            $item['preview'] = $preview[3];
            $i++;
            $j = 0; 
            foreach($html->find('guid') as $element) {
                $j++;
                if($i == $j){
                    $htmlx = $obj->file_get_html($element->plaintext);
                    $title = 'h1';
                    $preview = 'h3';
                    $detail = 'div.fck_detail';
                    $img = 'description img';
                    foreach($htmlx->find($title) as $element)
                    {   
                        $item['title'] = $element->innertext;//lấy title
                    }
                    foreach($htmlx->find($detail) as $element)
                    {   
                        $item['detail'] = $element->innertext; // Lấy toàn bộ phần html
                    }
                    $arNews = News::all();
                    $k = 0;
                    foreach($arNews as $items){
                        if($items['name'] == $item['title']){
                            $k++;
                        }
                    }
                    if($k == 0){

                        $arItem = array(
                            'name' => $item['title'],
                            'picture' => $item['picture'],
                            'preview' => $item['preview'],
                            'detail' => $item['detail'],
                            'id_cat' => $id_cat,
                            'id_catchild' => $id_catchild,
                            'active' => $status,
                            'id_user' => $arUser->id,
                            'read' => 0
                            );

                        if(News::insert($arItem)){
                            $ch = curl_init($tmp_name);
                            $fp = fopen($path_upload, 'wb');
                            curl_setopt($ch, CURLOPT_FILE, $fp);
                            curl_setopt($ch, CURLOPT_HEADER, 0);
                            curl_exec($ch);
                            curl_close($ch);
                            fclose($fp);
                            $request->session()->flash('msg','Thêm thành công');
                        }else{
                            $request->session()->flash('msg','Có lỗi khi thêm');
                            return redirect()->route('admin.getnews.index');
                        }
                    }else{
                        $request->session()->flash('msg','Tin bị trùng!');
                        //return redirect()->route('admin.getnews.index');
                    }
                }

            }
            // $html = $obj->file_get_html($linkname);
        }

        $request->session()->flash('msg','Bạn đã lấy tin thành công!');
         return redirect()->route('admin.getnews.index');

        $this->info('The happy birthday messages were sent successfully!');

    }
     public function fire()
    { 
        //Khai báo đường dẫn tới command class
        Bus::dispatchFromArray('App\Commands\NewAuto', []);
    } 
}
