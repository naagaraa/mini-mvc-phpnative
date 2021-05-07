<?php

namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class DeskriptionCommand extends Command
{
    protected function configure()
    {
        $this->setName('about:deskription')
            ->setDescription("view deskription about mini mvc php native project by nagara")
            ->setHelp("\n\nauthor ekajayanagara as miyuki nagara\nstudent infomatic at darma persada\n\n");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(sprintf("i'm a student and programmer"));
        return Command::SUCCESS;
    }
}
