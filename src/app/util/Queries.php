<?php

/**
 * Description of Queries
 *
 * @author Fernando
 */
class Queries {

    const CHECK_LOGIN_EXISTS = 'SELECT count(r.login) as count FROM runner r WHERE r.login LIKE :login';
    
    const CHECK_EMAIL_EXISTS = 'SELECT count(r.email) as count FROM runner r WHERE r.email LIKE :email';
    
    const GET_RUNS_BY_RUNNER_ID  = "SELECT r.date, r.distance, r.duration, r.avgSpeed, r.pace, r.notes, r.id FROM run r WHERE r.runner = :id ORDER BY r.date DESC";
   
    const GET_RUN_COUNT = 'SELECT count(r) FROM run r WHERE r.runner = :id';

    const REMOVE_RUN_BY_ID = 'DELETE FROM run r WHERE r.id = :id';
    
    const GET_RUNS_BY_DATE = 'SELECT r FROM run r WHERE r.date = :date AND r.runner = :runner_id ORDER BY r.id';

    const GET_RUN_BY_RUNNER_ID_RUN_ID = 'SELECT r FROM run r WHERE r.id = :runid AND r.runner = :runnerid';
    
    const UPDATE_RECOVERED_PASSWORD = 'UPDATE recoverPassword r SET r.used = true WHERE r.id = :id';
    
    const GET_RUNNER_BY_EMAIL = 'SELECT r FROM runner r WHERE r.email LIKE :email';

    //Native Queries
    const GET_RUNS_BY_RUNNER_ID_NATIVE  = 'SELECT r.date, r.distance, r.duration, r.avgSpeed, r.pace, r.notes, r.id FROM run r WHERE r.runner_id = :id';
    
//    const CHECK_LOGIN_EXISTS = 'SELECT count(r.login) as count FROM runner r WHERE r.login LIKE :login';
//    
//    const CHECK_EMAIL_EXISTS = 'SELECT count(r.email) as count FROM runner r WHERE r.email LIKE :email';
    
    const GET_CURRENT_PASS = 'SELECT r.password as pass FROM runner r WHERE r.id = :id';

    const LOGIN_WITH_EMAIl = 'SELECT r.id, r.email, r.login, r.name FROM runner r WHERE r.email = :email AND BINARY r.password = :password';
    
    const LOGIN_WITH_LOGIN = 'SELECT r.id, r.email, r.login, r.name FROM runner r WHERE r.login = :login AND BINARY r.password = :password';
    
    const GET_RUNNER_ID_CODE_BY_PASSWORD_CODE = 'SELECT r.id AS id, r.runner_id AS runner_id, r.code AS code FROM recoverPassword r WHERE UNIX_TIMESTAMP(r.expiration) > UNIX_TIMESTAMP(CURRENT_TIMESTAMP) and r.used = false and r.code LIKE :code';   
    
    const GET_MIN_MAX_SENTENCE_ID = 'SELECT min(s.id) AS min, max(s.id) AS max FROM sentence s';
    
    const CHECK_SENTENCE_EXISTS = 'SELECT 1 FROM sentence s WHERE s.id = :id';
    
}
