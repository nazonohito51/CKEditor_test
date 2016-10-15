<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UploadAssets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'asset:upload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload assets that exist under public/cdn/ directory to cdn server.';

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
        try {
            $s3_client = new \Aws\S3\S3Client([
                'version' => 'latest',
                'region'  => 'us-east-1'
            ]);
            $upload_dir_path = public_path('cdn');
            $result = $s3_client->getObject([
                'Bucket' => 'my-bucket',
                'Key'    => 'my-key'
            ]);
        } catch (\Aws\S3\Exception\S3Exception $e) {
            $this->error('Assets upload is failed.');
            $this->error('S3 message:');
            $this->error($e->getMessage());
            return 1;
        }

        $this->info('Assets upload is done.');
        return 0;
    }
}
