<?php
class Analysisresult {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function fetchteacher($lname) {
    	$queryString = "SELECT teacher_id, CONCAT(teacher_lname,', ', teacher_fname,' ', teacher_mname) AS fullname FROM teacher WHERE teacher_lname LIKE '$lname%'";

    	$this->db->query($queryString);
        $result = $this->db->resultSet();

        return json_encode($result);
    }


    public function fetchComparativeAnalysis1Data($id,$dept,$area) {

        switch ($area) {
        case 'PAA':
            $queryString = $this->queryStringVal("ROUND((AVG(A+B+C+D+E+F+G+H+I+J+K)/11),2) AS GENAVG",$id,$dept);
            break;
        case 'KSM':
            $queryString = $this->queryStringVal("ROUND((AVG(L+M+N+O+P+Q+R)/7),2) AS GENAVG",$id,$dept);
            break;
        case 'TS':
            $queryString = $this->queryStringVal("ROUND((AVG(S+T+U+V+W+X+Y+Z+AA)/9),2) AS GENAVG",$id,$dept);
            break;
        case 'CM':
            $queryString = $this->queryStringVal("ROUND((AVG(BB+CC+DD+EE+FF)/5),2) AS GENAVG",$id,$dept);
            break;
        case 'GO':
            $queryString = $this->queryStringVal("ROUND((AVG(GG+HH+II+JJ)/4),2) AS GENAVG",$id,$dept);
            break;
        }

        $this->db->query($queryString);
        $result = $this->db->resultSet();

        return json_encode($result);
        //return $queryString;
    }

    public function fetchComparativeAnalysis2Data($id,$dept) {

        $paa = $this->queryStringVal("ROUND((AVG(A+B+C+D+E+F+G+H+I+J+K)/11),2) AS GENAVG",$id,$dept);
        $ksm = $this->queryStringVal("ROUND((AVG(L+M+N+O+P+Q+R)/7),2) AS GENAVG",$id,$dept);
        $ts = $this->queryStringVal("ROUND((AVG(S+T+U+V+W+X+Y+Z+AA)/9),2) AS GENAVG",$id,$dept);
        $cm = $this->queryStringVal("ROUND((AVG(BB+CC+DD+EE+FF)/5),2) AS GENAVG",$id,$dept);
        $go = $this->queryStringVal("ROUND((AVG(GG+HH+II+JJ)/4),2) AS GENAVG",$id,$dept);

        $this->db->query($paa);
        $paa_res = $this->db->resultSet();

        $this->db->query($ksm);
        $ksm_res = $this->db->resultSet();

        $this->db->query($ts);
        $ts_res = $this->db->resultSet();

        $this->db->query($cm);
        $cm_res = $this->db->resultSet();

        $this->db->query($go);
        $go_res = $this->db->resultSet();

        $result = array($paa_res,$ksm_res,$ts_res,$cm_res,$go_res);
        return json_encode($result);
        //return $queryString;
    }

    public function queryStringVal($var,$id,$dept) {
        $query="            
                SELECT * FROM

                (
                /*SY2016-2017 1ST SEM (COLLEGE)*/
                SELECT * FROM
                (SELECT r.teacher_id, result_date,('2016-2017 S1') AS identity, CONCAT(teacher_lname,', ', teacher_fname,' ', teacher_mname) AS fullname,
                $var

                FROM result r INNER JOIN teacher t ON r.teacher_id=t.teacher_id
                INNER JOIN student s ON r.stud_ID=s.stud_ID
                INNER JOIN department d ON s.dept_id=d.dept_id

                WHERE s.dept_id=$dept AND(result_date BETWEEN CAST('2016-10-17' AS DATE) AND CAST('2016-10-21' AS DATE)) GROUP BY r.teacher_id) AS tbl1

                UNION

                /*SY2016-2017 2ND SEM (COLLEGE)*/
                SELECT * FROM
                (SELECT r.teacher_id, result_date, ('2016-2017 S2') AS identity, CONCAT(teacher_lname,', ', teacher_fname,' ', teacher_mname) AS fullname,
                $var

                FROM result r INNER JOIN teacher t ON r.teacher_id=t.teacher_id
                INNER JOIN student s ON r.stud_ID=s.stud_ID
                INNER JOIN department d ON s.dept_id=d.dept_id

                WHERE s.dept_id=$dept AND(result_date BETWEEN CAST('2017-03-20' AS DATE) AND CAST('2017-03-24' AS DATE)) GROUP BY r.teacher_id) AS tbl2

                UNION

                /*SY2017-2018 1ST SEM (COLLEGE)*/
                SELECT * FROM
                (SELECT r.teacher_id, result_date, ('2017-2018 S1') AS identity, CONCAT(teacher_lname,', ', teacher_fname,' ', teacher_mname) AS fullname,
                $var

                FROM result r INNER JOIN teacher t ON r.teacher_id=t.teacher_id
                INNER JOIN student s ON r.stud_ID=s.stud_ID
                INNER JOIN department d ON s.dept_id=d.dept_id

                WHERE s.dept_id=$dept AND(result_date BETWEEN CAST('2017-10-09' AS DATE) AND CAST('2017-10-13' AS DATE)) GROUP BY r.teacher_id) AS tbl3

                UNION

                /*SY2017-2018 2ND SEM (COLLEGE)*/
                SELECT * FROM
                (SELECT r.teacher_id, result_date, ('2017-2018 S2') AS identity, CONCAT(teacher_lname,', ', teacher_fname,' ', teacher_mname) AS fullname,
                $var

                FROM result r INNER JOIN teacher t ON r.teacher_id=t.teacher_id
                INNER JOIN student s ON r.stud_ID=s.stud_ID
                INNER JOIN department d ON s.dept_id=d.dept_id

                WHERE s.dept_id=$dept AND(result_date BETWEEN CAST('2018-03-26' AS DATE) AND CAST('2018-03-30' AS DATE)) GROUP BY r.teacher_id) AS tbl4

                UNION

                /*SY2018-2019 1ST SEM (COLLEGE)*/
                SELECT * FROM
                (SELECT r.teacher_id, result_date, ('2018-2019 S1') AS identity, CONCAT(teacher_lname,', ', teacher_fname,' ', teacher_mname) AS fullname,
                $var

                FROM result r INNER JOIN teacher t ON r.teacher_id=t.teacher_id
                INNER JOIN student s ON r.stud_ID=s.stud_ID
                INNER JOIN department d ON s.dept_id=d.dept_id

                WHERE s.dept_id=$dept AND(result_date BETWEEN CAST('2018-10-15' AS DATE) AND CAST('2018-10-19' AS DATE)) GROUP BY r.teacher_id) AS tbl5

                UNION

                /*SY2018-2019 2ND SEM (COLLEGE)*/
                SELECT * FROM
                (SELECT r.teacher_id, result_date, ('2018-2019 S2') AS identity, CONCAT(teacher_lname,', ', teacher_fname,' ', teacher_mname) AS fullname,
                $var

                FROM result r INNER JOIN teacher t ON r.teacher_id=t.teacher_id
                INNER JOIN student s ON r.stud_ID=s.stud_ID
                INNER JOIN department d ON s.dept_id=d.dept_id

                WHERE s.dept_id=$dept AND(result_date BETWEEN CAST('2019-03-11' AS DATE) AND CAST('2019-03-15' AS DATE)) GROUP BY r.teacher_id) AS tbl6

                UNION

                /*SY2019-2020 1ST SEM (COLLEGE)*/
                SELECT * FROM
                (SELECT r.teacher_id, result_date, ('2019-2020 S1') AS identity, CONCAT(teacher_lname,', ', teacher_fname,' ', teacher_mname) AS fullname,
                $var

                FROM result r INNER JOIN teacher t ON r.teacher_id=t.teacher_id
                INNER JOIN student s ON r.stud_ID=s.stud_ID
                INNER JOIN department d ON s.dept_id=d.dept_id

                WHERE s.dept_id=$dept AND(result_date BETWEEN CAST('2019-10-21' AS DATE) AND CAST('2019-10-25' AS DATE)) GROUP BY r.teacher_id) AS tbl7

                UNION

                /*SY2019-2020 2ND SEM (COLLEGE)*/
                SELECT * FROM
                (SELECT r.teacher_id, result_date, ('2019-2020 S2') AS identity, CONCAT(teacher_lname,', ', teacher_fname,' ', teacher_mname) AS fullname,
                $var

                FROM result r INNER JOIN teacher t ON r.teacher_id=t.teacher_id
                INNER JOIN student s ON r.stud_ID=s.stud_ID
                INNER JOIN department d ON s.dept_id=d.dept_id

                WHERE s.dept_id=$dept AND(result_date BETWEEN CAST('2020-03-09' AS DATE) AND CAST('2020-03-13' AS DATE)) GROUP BY r.teacher_id) AS tbl8

                ) AS tbljoin



                WHERE teacher_id=$id";

                return $query;
    }

}