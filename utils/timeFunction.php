<?php
/**
 * Converts a timestamp to a human-readable time difference.
 *
 * @param int $datetime The timestamp to convert.
 * @param bool $full Whether to return the full time difference or just the first unit.
 * @return string The human-readable time difference.
 */
function timeFunction($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime("@$datetime");
    $ago->setTimezone(new DateTimeZone(date_default_timezone_get()));
    $diff = $now->diff($ago);

    $units = [
        'y' => 'year',
        'm' => 'month',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    ];
    $result = [];

    foreach ($units as $k => $v) {
        if ($diff->$k) {
            $result[] = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        }
    }

    if (!$full) $result = array_slice($result, 0, 1);
    return $result ? $result[0] . ' ago' : 'just now';
}
?>