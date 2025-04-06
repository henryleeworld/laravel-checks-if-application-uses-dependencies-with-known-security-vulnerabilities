<?php

use Illuminate\Support\Facades\Schedule;
use Jorijn\LaravelSecurityChecker\Console\SecurityMailCommand;

Schedule::command(SecurityMailCommand::class)->weekly();
