<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use App\User;
use Hash;
use Validator;

class InstallCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Install';

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
	public function fire()
	{
		$name = $this->ask('Name: ');
		$email = $this->ask('Email: ');
		$password = $this->secret('Password: ');
		$mobile = $this->ask('Mobile: ');

		$validate = Validator::make([
			'email' => $email,
			'password' => $password,
			'mobile' => $mobile
		], [
			'email' => 'required|email|unique:users',
			'password' => 'required|min:6',
			'mobile' => 'required|digits:10'
		]);

		if($validate->fails()) {
			foreach($validate->messages()->all() as $msg) {
				$this->error($msg);
			}
			exit();
		}

		User::create([
			'email' => $email,
			'password' => Hash::make($password),
			'mobile' => $mobile,
			'leader_name' => $name,
			'type' => 'admin',
			'team_name' => '管理團隊'
		]);
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			// ['example', InputArgument::REQUIRED, 'An example argument.'],
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
		];
	}

}
