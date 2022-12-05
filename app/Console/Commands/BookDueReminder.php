<?php

namespace App\Console\Commands;

use App\Models\book_issue;
use App\Notifications\BookDue;
use Carbon\Carbon;
use Illuminate\Console\Command;

class BookDueReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'book:due';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command send books due reminder to students';

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
     * @return int
     */
    public function handle()
    {
        book_issue::chunk(200, function($books) {
            foreach($books as $book) {
                $today = Carbon::now();
                if ($today->diffInDays($book->return_date,false) <= 2) {
                    $book->student->notify(new BookDue($book->book->name, $book->return_date));
                }
            } 
        });
        return 0;
    }
}
