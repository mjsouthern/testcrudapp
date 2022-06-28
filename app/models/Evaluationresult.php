<?php
class Evaluationresult {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getSummarizedResults($startdate,$enddate,$dept){
        $queryString = "SELECT r.teacher_id, CONCAT(teacher_lname,', ', teacher_fname,' ', teacher_mname) AS fullname,
            ROUND((AVG(A+B+C+D+E+F+G+H+I+J+K)/11),2) AS GENAVGPAA,
            ROUND((AVG(L+M+N+O+P+Q+R)/7),2) AS GENAVGKSM,
            ROUND((AVG(S+T+U+V+W+X+Y+Z+AA)/9),2) AS GENAVGTS,
            ROUND((AVG(BB+CC+DD+EE+FF)/5),2) AS GENAVGCM,
            ROUND((AVG(GG+HH+II+JJ)/4),2) AS GENAVGGO,
            tblavg.OVERALLAVG

            FROM result r INNER JOIN teacher t ON r.teacher_id=t.teacher_id
            INNER JOIN student s ON r.stud_ID=s.stud_ID
            INNER JOIN department d ON s.dept_id=d.dept_id
            INNER JOIN
            (

            SELECT teacher_id,
            ROUND((AVG(GENAVGPAA+GENAVGKSM+GENAVGTS+GENAVGCM+GENAVGGO)/5),2) AS OVERALLAVG

            FROM
            (
            SELECT r.teacher_id,
            (AVG(A+B+C+D+E+F+G+H+I+J+K)/11) AS GENAVGPAA,
            (AVG(L+M+N+O+P+Q+R)/7) AS GENAVGKSM,
            (AVG(S+T+U+V+W+X+Y+Z+AA)/9) AS GENAVGTS,
            (AVG(BB+CC+DD+EE+FF)/5) AS GENAVGCM,
            (AVG(GG+HH+II+JJ)/4) AS GENAVGGO
            FROM result r INNER JOIN teacher t ON r.teacher_id=t.teacher_id INNER JOIN student s ON r.stud_ID=s.stud_ID INNER JOIN department d ON s.dept_id=d.dept_id WHERE(s.dept_id = $dept) AND (result_date BETWEEN CAST('$startdate' AS DATE) AND CAST('$enddate' AS DATE)) GROUP BY r.teacher_id ORDER BY teacher_lname
            ) AS TBLAVG

            GROUP BY TBLAVG.teacher_id

            ) tblavg ON tblavg.teacher_id=r.teacher_id
            WHERE(s.dept_id = $dept) AND (result_date BETWEEN CAST('$startdate' AS DATE) AND CAST('$enddate' AS DATE)) GROUP BY r.teacher_id ORDER BY teacher_lname";


        $this->db->query($queryString);
        $result = $this->db->resultSet();

        return json_encode($result);
    }


    public function getDetailedResults($startdate,$enddate,$dept,$lname){
        $queryString = "SELECT r.teacher_id, CONCAT(teacher_lname,', ', teacher_fname,' ', teacher_mname) AS fullname,
        ROUND(AVG(A),2) AS A, ROUND(AVG(B),2) AS B, ROUND(AVG(C),2) AS C, ROUND(AVG(D),2) AS D, ROUND(AVG(E),2) AS E, ROUND(AVG(F),2) AS F, ROUND(AVG(G),2) AS G, ROUND(AVG(H),2) AS H, ROUND(AVG(I),2) AS I, ROUND(AVG(J),2) AS J, ROUND(AVG(K),2) AS K, ROUND((AVG(A+B+C+D+E+F+G+H+I+J+K)/11),2) AS GENAVGPAA,
        ROUND(AVG(L),2) AS L, ROUND(AVG(M),2) AS M, ROUND(AVG(N),2) AS N, ROUND(AVG(O),2) AS O, ROUND(AVG(P),2) AS P, ROUND(AVG(Q),2) AS Q, ROUND(AVG(R),2) AS R, ROUND((AVG(L+M+N+O+P+Q+R)/7),2) AS GENAVGKSM,
        ROUND(AVG(S),2) AS S, ROUND(AVG(T),2) AS T, ROUND(AVG(U),2) AS U, ROUND(AVG(V),2) AS V, ROUND(AVG(W),2) AS W, ROUND(AVG(X),2) AS X, ROUND(AVG(Y),2) AS Y, ROUND(AVG(Z),2) AS Z, ROUND(AVG(AA),2) AS AA, ROUND((AVG(S+T+U+V+W+X+Y+Z+AA)/9),2) AS GENAVGTS,
        ROUND(AVG(BB),2) AS BB, ROUND(AVG(CC),2) AS CC, ROUND(AVG(DD),2) AS DD, ROUND(AVG(EE),2) AS EE, ROUND(AVG(FF),2) AS FF,ROUND((AVG(BB+CC+DD+EE+FF)/5),2) AS GENAVGCM,
        ROUND(AVG(GG),2) AS GG, ROUND(AVG(HH),2) AS HH, ROUND(AVG(II),2) AS II, ROUND(AVG(JJ),2) AS JJ,ROUND(
        (AVG(GG+HH+II+JJ)/4),2) AS GENAVGGO,
        tblavg.OVERALLAVG, COUNT(r.stud_ID) AS countstudents

        FROM result r INNER JOIN teacher t ON r.teacher_id=t.teacher_id
        INNER JOIN student s ON r.stud_ID=s.stud_ID
        INNER JOIN department d ON s.dept_id=d.dept_id
        INNER JOIN
        (

        SELECT teacher_id,
        ROUND((AVG(GENAVGPAA+GENAVGKSM+GENAVGTS+GENAVGCM+GENAVGGO)/5),2) AS OVERALLAVG

        FROM
        (
        SELECT r.teacher_id,
        (AVG(A+B+C+D+E+F+G+H+I+J+K)/11) AS GENAVGPAA,
        (AVG(L+M+N+O+P+Q+R)/7) AS GENAVGKSM,
        (AVG(S+T+U+V+W+X+Y+Z+AA)/9) AS GENAVGTS,
        (AVG(BB+CC+DD+EE+FF)/5) AS GENAVGCM,
        (AVG(GG+HH+II+JJ)/4) AS GENAVGGO
        FROM result r INNER JOIN teacher t ON r.teacher_id=t.teacher_id INNER JOIN student s ON r.stud_ID=s.stud_ID INNER JOIN department d ON s.dept_id=d.dept_id WHERE(s.dept_id = $dept) AND (result_date BETWEEN CAST('$startdate' AS DATE) AND CAST('$enddate' AS DATE)) GROUP BY r.teacher_id ORDER BY teacher_lname
        ) AS TBLAVG

        GROUP BY TBLAVG.teacher_id

        ) tblavg ON tblavg.teacher_id=r.teacher_id
        WHERE(s.dept_id = $dept) AND (result_date BETWEEN CAST('$startdate' AS DATE) AND CAST('$enddate' AS DATE)) AND t.teacher_lname LIKE '$lname%' GROUP BY r.teacher_id ORDER BY teacher_lname";


        $this->db->query($queryString);
        $result = $this->db->resultSet();

        return json_encode($result);
    }


}