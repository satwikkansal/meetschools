<?php

namespace Meetschools\Doctrine_Extension;

use Doctrine\DBAL\Logging\SQLLogger;
class Logger implements SQLLogger {

    public function startQuery($sql, array $params = NULL, array $types = NULL) {
        log_message('DEBUG', 'Query started.');
        log_message('DEBUG', 'query: ' . $sql);
    }

    public function stopQuery() {
        log_message('DEBUG', 'Query executed.');
    }
}

/* End of file logger.php */
/* Location: ./application/libraries/doctrine_extension/logger.php */
