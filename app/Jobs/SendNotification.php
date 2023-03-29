<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
     protected $mobile;
     protected $msg;
    /**
     * Create a new job instance.
     */
    public function __construct($mobile , $msg)
    {
        $this->mobile = $mobile;
        $this->msg = $msg;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $ch = curl_init('https://www.textguru.in/imobile/api.php?');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"username=softgen&password=80079162&source=SOFTGN&dmobile=".$this->mobile."&message=".$this->msg);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $data = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

    }
}
