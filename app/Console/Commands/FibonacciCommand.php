<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FibonacciCommand extends Command
{
    protected $signature = 'calculate:fibonacci {n : Number of terms to calculate}';
    protected $description = 'Calculates the Fibonacci sequence up to the given number';

    public function handle()
    {
        $n = (int) $this->argument('n');
        if ($n < 1) return $this->error('Please enter a number greater than 0.');

        $this->info('Fibonacci sequence of ' . $n . ' terms:');
        $this->line(implode(', ', $this->fibonacci($n)));
    }

    private function fibonacci($n)
    {
        $fib = [0, 1];
        for ($i = 2; $i < $n; $i++) $fib[] = $fib[$i - 1] + $fib[$i - 2];
        return array_slice($fib, 0, $n);
    }
}
