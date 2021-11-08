<?php

declare(strict_types=1);

namespace spec\Synolia\SyliusSchedulerCommandPlugin\Command;

use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Console\Command\Command;
use Synolia\SyliusSchedulerCommandPlugin\Command\SynoliaSchedulerRunCommand;
use Synolia\SyliusSchedulerCommandPlugin\Planner\ScheduledCommandPlannerInterface;
use Synolia\SyliusSchedulerCommandPlugin\Repository\CommandRepositoryInterface;
use Synolia\SyliusSchedulerCommandPlugin\Repository\ScheduledCommandRepositoryInterface;
use Synolia\SyliusSchedulerCommandPlugin\Runner\ScheduleCommandRunnerInterface;
use Synolia\SyliusSchedulerCommandPlugin\Voter\IsDueVoterInterface;

final class SynoliaSchedulerRunCommandSpec extends ObjectBehavior
{
    function let(
        EntityManagerInterface $scheduledCommandManager,
        ScheduleCommandRunnerInterface $scheduleCommandRunner,
        CommandRepositoryInterface $commandRepository,
        ScheduledCommandRepositoryInterface $scheduledCommandRepository,
        ScheduledCommandPlannerInterface $scheduledCommandPlanner,
        IsDueVoterInterface $isDueVoter
    ) {
        $this->beConstructedWith(
            $scheduledCommandManager,
            $scheduleCommandRunner,
            $commandRepository,
            $scheduledCommandRepository,
            $scheduledCommandPlanner,
            $isDueVoter
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(SynoliaSchedulerRunCommand::class);
        $this->shouldBeAnInstanceOf(Command::class);
    }
}
