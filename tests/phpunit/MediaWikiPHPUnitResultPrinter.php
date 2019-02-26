<?php

class MediaWikiPHPUnitResultPrinter extends PHPUnit_TextUI_ResultPrinter {
	/** @var MediaWikiLoggerPHPUnitTestListener */
	private static $logListener;

	public static function setLogListener( MediaWikiLoggerPHPUnitTestListener $logListener ) {
		self::$logListener = $logListener;
	}

	protected function printDefectTrace( PHPUnit_Framework_TestFailure $defect ) {
		$log = self::$logListener->getLog();
		if ( $log ) {
			$this->write( "=== Logs generated by test case\n{$log}\n===\n" );
		}
		parent::printDefectTrace( $defect );
	}
}