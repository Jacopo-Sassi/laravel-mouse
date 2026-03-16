<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-invoices {number} {date?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //print "inizio command \n";
        $this->info("inizio command");
        //$number = $this->arguments()['number'];
        $number = $this->argument('number');
        $date = $this->argument('date');
        if($date){
            //$invoices = Invoice::where('date', $date)->get(); 
            $this->info('Recupero le fatture del giorno '.$date);
        }else{
            $date = now()->subDays(1)->format('Y-m-d');
            $this->info('Recupero le fatture del giorno '.$date);
            //$invoices = Invoice::where('date', $date);
        }
        for($i=0;$i<$number;$i++){
            if(rand(0,1)<1){
                $this->info("Invio effettuato con successo, fattura ".$i);
                //print "Invio effettuato con successo, fattura ".$i."\n";
            }else{
                $this->error("Si è verificato un errore durante l'invio della fattura ".$i);
                //print "Si è verificato un errore durante l'invio della fattura ".$i."\n";
            }
        }
        //sleep(10);
        //print "fine command \n";
        $this->info("fine command");
    }
}
