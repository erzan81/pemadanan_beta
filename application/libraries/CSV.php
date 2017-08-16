<?php
class CSV
{
	private $filePath;
	private $fileContents;
	const ACCEPTABLE_DELIMITERS = '~[#,;:|]~'; // acceptable delimiters

	public function __construct($file)
	{
		$this->filePath = $file;
		$this->fileContents = file($file);
	}

	public function getDelimiter()
	{
		$delimitersByLine = array();
		foreach ($this->fileContents as $lineNumber => $line)
		{
			$quoted = false;
			$delimiters = array();

			for ($i = 0; $i < strlen($line) - 1; $i++)
			{
				$char = substr($line, $i, 1);
				if ($char === '"')
				{
					$quoted = !$quoted;
				}
				else if (!$quoted && preg_match(self::ACCEPTABLE_DELIMITERS, $char))
				{
					if (array_key_exists($char, $delimiters))
					{
						$delimiters[$char]++;
					}
					else
					{
						$delimiters[$char] = 1;
					}
				}
			}

			if (empty($delimitersByLine))
			{
				$delimitersByLine = $delimiters;
			}
			else
			{
				$newDelimitersByLine = $delimiters;
				foreach ($delimitersByLine as $key => $value)
				{
					if ((array_key_exists($key, $delimiters) && $delimiters[$key] === $value)
						|| !array_key_exists($key, $delimiters))
					{
						$newDelimitersByLine[$key] = $value;
					}
				}
				$delimitersByLine = $newDelimitersByLine;

				if (sizeof($delimitersByLine) < 2)
					break;
			}
		}

		arsort($delimitersByLine);
		$firstDelimiter = key($delimitersByLine);

		if (sizeof($delimitersByLine) > 1)
		{
			next($delimitersByLine);
			$nextDelimiter = key($delimitersByLine);
			if ($delimitersByLine[$firstDelimiter] === $delimitersByLine[$nextDelimiter])
			{
				// multiple delimiters with the same frequency found
				// throw an error
				throw new UnexpectedValueException();
			}

			return $firstDelimiter;
		}
		else
			return $firstDelimiter;
	}
}