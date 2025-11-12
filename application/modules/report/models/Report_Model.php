<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Report_Model extends MY_Model {



    function __construct() {



        parent::__construct();

    }



    public function get_income_report($school_id, $academic_year_id, $group_by, $date_from, $date_to) {







        $group_by_sql = '';



        $group_by_field = '';







        if ($group_by && $group_by == 'daily') {



            $group_by_sql .= " GROUP BY T.payment_date ORDER BY T.payment_date ASC";



            $group_by_field .= ", DATE_FORMAT(T.payment_date, '%b %d, %Y') AS group_by_field";

        } elseif ($group_by && $group_by == 'monthly') {



            $group_by_sql .= " GROUP BY MONTH(T.payment_date), YEAR(I.date) ORDER BY I.date ASC";



            $group_by_field .= ", DATE_FORMAT(T.payment_date, '%M, %Y') AS group_by_field";

        } elseif ($group_by && $group_by == 'yearly') {



            $group_by_sql .= " GROUP BY I.academic_year_id ORDER BY I.academic_year_id ASC";



            $group_by_field .= ", DATE_FORMAT(T.payment_date, '%Y') AS group_by_field";

        } elseif ($group_by && $group_by == 'income_by') {



            $group_by_sql .= " GROUP BY T.payment_method ORDER BY T.payment_method ASC";



            $group_by_field .= ", T.payment_method AS group_by_field";

        }







        $sql = "SELECT I.*, SUM(T.amount) AS total_amount, T.payment_date, AY.session_year $group_by_field 



                FROM invoices AS I                



                LEFT JOIN transactions AS T ON T.invoice_id = I.id 



                LEFT JOIN academic_years AS AY ON AY.id = I.academic_year_id 



                WHERE I.status = 1 AND T.amount > 0";







        if ($date_from != '' && $date_to != '') {



            $sql .= " AND I.date >= '$date_from' AND I.date <= '$date_to' ";

        }



        if ($date_from != '' && $date_to == '') {



            $sql .= "I.date >= '$date_from'";

        }



        if ($academic_year_id) {



            $sql .= " AND I.academic_year_id = '$academic_year_id'";

        }



        if ($school_id) {



            $sql .= " AND I.school_id = '$school_id'";

        }











        $sql .= $group_by_sql;







        return $this->db->query($sql)->result();

    }



    public function get_expenditure_report($school_id, $academic_year_id, $group_by, $date_from, $date_to) {







        $group_by_sql = '';



        $group_by_field = '';



        if ($group_by && $group_by == 'expenditure_head') {



            $group_by_sql .= " GROUP BY H.title ORDER BY H.title ASC";



            $group_by_field .= ", H.title AS group_by_field";

        } elseif ($group_by && $group_by == 'daily') {



            $group_by_sql .= " GROUP BY E.date ORDER BY E.date ASC";



            $group_by_field .= ", DATE_FORMAT(E.date, '%b %d, %Y') AS group_by_field";

        } elseif ($group_by && $group_by == 'monthly') {



            $group_by_sql .= " GROUP BY MONTH(E.date), YEAR(E.date) ORDER BY E.date ASC";



            $group_by_field .= ", DATE_FORMAT(E.date, '%M, %Y') AS group_by_field";

        } elseif ($group_by && $group_by == 'yearly') {



            $group_by_sql .= " GROUP BY E.academic_year_id ORDER BY E.academic_year_id ASC";



            $group_by_field .= ", DATE_FORMAT(E.date, '%Y') AS group_by_field";

        } elseif ($group_by && $group_by == 'expenditure_by') {



            $group_by_sql .= " GROUP BY E.expenditure_via ORDER BY E.expenditure_via ASC";



            $group_by_field .= ", E.expenditure_via AS group_by_field";

        }







        $sql = "SELECT E.*, SUM(E.amount) AS total_amount, H.title AS head, AY.session_year $group_by_field 



                FROM expenditures AS E 



                LEFT JOIN expenditure_heads AS H ON H.id = E.expenditure_head_id 



                LEFT JOIN academic_years AS AY ON AY.id = E.academic_year_id 



                WHERE E.status = 1 ";



        if ($date_from != '' && $date_to != '') {



            $sql .= " AND E.date >= '$date_from' AND E.date <= '$date_to' ";

        }



        if ($date_from != '' && $date_to == '') {



            $sql .= "E.date >= '$date_from'";

        }



        if ($academic_year_id) {



            $sql .= " AND E.academic_year_id = '$academic_year_id'";

        }



        if ($school_id) {



            $sql .= " AND E.school_id = '$school_id'";

        }











        $sql .= $group_by_sql;







        return $this->db->query($sql)->result();

    }



    public function get_invoice_report($school_id, $academic_year_id, $group_by, $date_from, $date_to) {







        $group_by_sql = '';



        $group_by_field = '';







        if ($group_by && $group_by == 'daily') {



            $group_by_sql .= " GROUP BY I.date ORDER BY I.date ASC";



            $group_by_field .= ", DATE_FORMAT(I.date, '%b %d, %Y') AS group_by_field";

        } elseif ($group_by && $group_by == 'monthly') {



            $group_by_sql .= " GROUP BY MONTH(I.date), YEAR(I.date) ORDER BY I.date ASC";



            $group_by_field .= ", DATE_FORMAT(I.date, '%b, %Y') AS group_by_field";

        } elseif ($group_by && $group_by == 'yearly') {



            $group_by_sql .= " GROUP BY I.academic_year_id ORDER BY I.academic_year_id ASC";



            $group_by_field .= ", DATE_FORMAT(I.date, '%Y') AS group_by_field";

        } elseif ($group_by && $group_by == 'class') {



            $group_by_sql .= " GROUP BY I.class_id ORDER BY I.class_id ASC";



            $group_by_field .= ", C.name AS group_by_field";

        } elseif ($group_by && $group_by == 'paid_status') {



            $group_by_sql .= " GROUP BY I.paid_status ORDER BY I.paid_status ASC";



            $group_by_field .= ", I.paid_status AS group_by_field";

        }







        $sql = "SELECT I.*, SUM(I.net_amount) AS total_amount, SUM(I.discount) AS total_discount, AY.session_year $group_by_field 



                FROM invoices AS I               



                LEFT JOIN academic_years AS AY ON AY.id = I.academic_year_id 



                LEFT JOIN classes AS C ON C.id = I.class_id 



                WHERE I.status = 1 AND I.invoice_type != 'income'";







        if ($date_from != '' && $date_to != '') {



            $sql .= " AND I.date >= '$date_from' AND I.date <= '$date_to' ";

        }



        if ($date_from != '' && $date_to == '') {



            $sql .= "I.date >= '$date_from'";

        }



        if ($academic_year_id) {



            $sql .= " AND I.academic_year_id = '$academic_year_id'";

        }



        if ($school_id) {



            $sql .= " AND I.school_id = '$school_id'";

        }











        $sql .= $group_by_sql;







        return $this->db->query($sql)->result();

    }



    public function get_expenditure_by_date($school_id, $date) {



        $sql = "SELECT  SUM(E.amount) AS total_amount



                FROM expenditures AS E                



                WHERE E.date = '$date' AND E.school_id = '$school_id' GROUP BY E.date ASC";







        $exp = $this->db->query($sql)->row();



        return isset($exp->total_amount) ? $exp->total_amount : 0;

    }



    public function get_income_by_date($school_id, $date) {







        $sql = "SELECT  SUM(I.net_amount) AS total_amount



                FROM invoices AS I                



                WHERE I.date = '$date' AND I.school_id = '$school_id' GROUP BY I.date ASC";







        $income = $this->db->query($sql)->row();



        return isset($income->total_amount) ? $income->total_amount : 0;

    }



    public function get_library_report($school_id, $academic_year_id, $group_by, $date_from, $date_to) {







        $group_by_sql = '';



        $group_by_field = '';



        if ($group_by && $group_by == 'daily') {



            $group_by_sql .= " GROUP BY BI.issue_date ORDER BY BI.issue_date ASC";



            $group_by_field .= ", DATE_FORMAT(BI.issue_date, '%b %d, %Y') AS group_by_field";

        } elseif ($group_by && $group_by == 'monthly') {



            $group_by_sql .= " GROUP BY MONTH(BI.issue_date), YEAR(BI.issue_date) ORDER BY BI.issue_date ASC";



            $group_by_field .= ", DATE_FORMAT(BI.issue_date, '%M, %Y') AS group_by_field";

        } elseif ($group_by && $group_by == 'yearly') {



            $group_by_sql .= " GROUP BY BI.academic_year_id ORDER BY BI.academic_year_id ASC";



            $group_by_field .= ", DATE_FORMAT(BI.issue_date, '%Y') AS group_by_field";

        } elseif ($group_by && $group_by == 'class') {



            $group_by_sql .= " GROUP BY C.name ORDER BY C.name ASC";



            $group_by_field .= ", C.name AS group_by_field";

        }







        $sql = "SELECT BI.*, COUNT(BI.id) AS total_issue, SUM(BI.is_returned) AS total_returned, AY.session_year $group_by_field 



                FROM book_issues AS BI 



                LEFT JOIN library_members AS LM ON LM.id = BI.library_member_id 



                LEFT JOIN students AS S ON S.user_id = LM.user_id 



                LEFT JOIN enrollments AS E ON E.student_id = S.id 



                LEFT JOIN classes AS C ON C.id = E.class_id 



                LEFT JOIN academic_years AS AY ON AY.id = BI.academic_year_id 



                WHERE BI.status = 1 ";







        if ($date_from != '' && $date_to != '') {



            $sql .= " AND BI.issue_date >= '$date_from' AND BI.return_date <= '$date_to' ";

        }



        if ($date_from != '' && $date_to == '') {



            $sql .= "BI.issue_date >= '$date_from'";

        }







        if ($academic_year_id) {



            $sql .= " AND BI.academic_year_id = '$academic_year_id'";

        }







        if ($academic_year_id) {







            $sql .= " AND E.academic_year_id = '$academic_year_id'";

        }







        if ($school_id) {



            $sql .= " AND BI.school_id = '$school_id'";

        }











        $sql .= $group_by_sql;







        return $this->db->query($sql)->result();

    }



    public function get_student_list($school_id, $academic_year_id, $class_id, $section_id = null) {







        $this->db->select('E.roll_no,  S.id, S.name');



        $this->db->from('enrollments AS E');



        $this->db->join('students AS S', 'S.id = E.student_id', 'left');



        $this->db->where('E.academic_year_id', $academic_year_id);



        $this->db->where('E.class_id', $class_id);



        if ($section_id) {



            $this->db->where('E.section_id', $section_id);

        }



        $this->db->where('E.school_id', $school_id);



        $this->db->where('S.status_type', 'regular');



        return $this->db->get()->result();

    }



    public function get_student_report($school_id, $academic_year_id, $group_by) {







        $group_by_sql = '';



        $group_by_field = '';



        $sql_plus = '';







        if ($group_by && $group_by == 'gender') {



            $group_by_sql .= " GROUP BY C.name ORDER BY C.id ASC";



            $group_by_field .= ", C.name AS group_by_field";

        } elseif ($group_by && $group_by == 'vehicle') {



            $group_by_sql .= " GROUP BY C.name ORDER BY C.id ASC";



            $group_by_field .= ", C.name AS group_by_field";



            $sql_plus .= " AND S.is_transport_member = '1'";

        } elseif ($group_by && $group_by == 'library') {



            $group_by_sql .= " GROUP BY C.name ORDER BY C.id ASC";



            $group_by_field .= ", C.name AS group_by_field";



            $sql_plus .= " AND S.is_library_member = '1'";

        } elseif ($group_by && $group_by == 'hostel') {



            $group_by_sql .= " GROUP BY C.name ORDER BY C.id ASC";



            $group_by_field .= ", C.name AS group_by_field";



            $sql_plus .= " AND S.is_hostel_member = '1'";

        } elseif ($group_by && $group_by == 'class') {



            $group_by_sql .= " GROUP BY C.name ORDER BY C.id ASC";



            $group_by_field .= ", C.name AS group_by_field";

        }







        $sql = "SELECT S.id, COUNT(S.id) AS total, C.id as class_id, E.academic_year_id, AY.session_year $group_by_field 



                FROM students AS S 



                LEFT JOIN enrollments AS E ON E.student_id = S.id 



                LEFT JOIN classes AS C ON C.id = E.class_id 



                LEFT JOIN academic_years AS AY ON AY.id = E.academic_year_id 



                WHERE S.status = 1 ";







        if ($academic_year_id) {



            $sql_plus .= " AND E.academic_year_id = '$academic_year_id'";

        }



        if ($school_id) {



            $sql_plus .= " AND E.school_id = '$school_id'";

        }







        $sql .= $sql_plus;



        $sql .= $group_by_sql;







        return $this->db->query($sql)->result();

    }



    public function get_student_by_gender($school_id, $group_by, $class_id, $academic_year_id, $gender) {







        $extra = '';



        if ($group_by == 'vehicle') {



            $extra = "AND S.is_transport_member = '1'";

        }



        if ($group_by == 'library') {



            $extra = "AND S.is_library_member = '1'";

        }



        if ($group_by == 'hostel') {



            $extra = "AND S.is_hostel_member = '1'";

        }







        $sql = "SELECT COUNT(S.id) AS total



                FROM students AS S 



                LEFT JOIN enrollments AS E ON E.student_id = S.id 



                LEFT JOIN classes AS C ON C.id = E.class_id 



                WHERE S.status = 1  AND S.gender = '$gender'



                AND E.class_id = '$class_id'



                AND E.school_id = '$school_id'                



                $extra



                AND E.academic_year_id = '$academic_year_id'";



        return $this->db->query($sql)->row()->total;

    }



    public function get_student_invoice_report($school_id, $academic_year_id, $class_id, $student_id) {







        $this->db->select('I.*, SUM(T.amount) AS paid_amount, C.name AS class_name, ST.name AS student,  AY.session_year');



        $this->db->from('invoices AS I');



        $this->db->join('transactions AS T', 'T.invoice_id = I.id', 'left');



        $this->db->join('students AS ST', 'ST.id = I.student_id', 'left');



        $this->db->join('classes AS C', 'C.id = I.class_id', 'left');



        $this->db->join('academic_years AS AY', 'AY.id = I.academic_year_id', 'left');







        if ($school_id != '') {



            $this->db->where('I.school_id', $school_id);

        }







        if ($class_id != '') {



            $this->db->where('I.class_id', $class_id);

        }







        if ($student_id != '') {



            $this->db->where('I.student_id', $student_id);

        }







        if ($academic_year_id) {



            $this->db->where('I.academic_year_id', $academic_year_id);

        }







        $this->db->group_by('I.id', 'DESC');







        return $this->db->get()->result();

    }



    public function get_student_activity_report($school_id, $academic_year_id, $class_id, $student_id) {







        $this->db->select('SA.*, C.name AS class_name, ST.name, S.name AS section, AY.session_year');



        $this->db->from('student_activities AS SA');



        $this->db->join('students AS ST', 'ST.id = SA.student_id', 'left');



        $this->db->join('classes AS C', 'C.id = SA.class_id', 'left');



        $this->db->join('sections AS S', 'S.id = SA.section_id', 'left');



        $this->db->join('academic_years AS AY', 'AY.id = SA.academic_year_id', 'left');







        if ($school_id != '') {



            $this->db->where('SA.school_id', $school_id);

        }







        if ($class_id != '') {



            $this->db->where('SA.class_id', $class_id);

        }







        if ($student_id != '') {



            $this->db->where('SA.student_id', $student_id);

        }







        if ($academic_year_id) {



            $this->db->where('SA.academic_year_id', $academic_year_id);

        }







        return $this->db->get()->result();

    }



    public function get_payroll_report($school_id, $academic_year_id, $group_by, $payment_to, $month) {







        $group_by_sql = '';



        $group_by_field = '';







        if ($group_by && $group_by == 'salary_type') {



            $group_by_sql .= " GROUP BY SP.salary_type ORDER BY SP.salary_type ASC";



            $group_by_field .= ", SP.salary_type AS group_by_field";

        } elseif ($group_by && $group_by == 'payment_to') {



            $group_by_sql .= " GROUP BY SP.payment_to ORDER BY SP.payment_to ASC";



            $group_by_field .= ", SP.payment_to AS group_by_field";



            $group_by_field .= ", SP.payment_to AS group_by_field";

        } elseif ($group_by && $group_by == 'month') {



            $group_by_sql .= " GROUP BY SP.salary_month ORDER BY SP.salary_month ASC";



            $group_by_field .= ", SP.salary_month AS group_by_field";

        } elseif ($group_by && $group_by == 'yearly') {



            $group_by_sql .= " GROUP BY SP.academic_year_id ORDER BY SP.academic_year_id ASC";



            $group_by_field .= ", DATE_FORMAT(SP.salary_month, '%Y') AS group_by_field";

        } elseif ($group_by && $group_by == 'expenditure_by') {



            $group_by_sql .= " GROUP BY SP.payment_method ORDER BY SP.payment_method ASC";



            $group_by_field .= ", SP.payment_method AS group_by_field";

        }







        $sql = "SELECT SP.id, SUM(SP.net_salary) AS total_amount, AY.session_year $group_by_field



                FROM salary_payments AS SP 



                LEFT JOIN academic_years AS AY ON AY.id = SP.academic_year_id 



                WHERE SP.status = 1 ";







        if ($academic_year_id) {



            $sql .= " AND SP.academic_year_id = '$academic_year_id'";

        }



        if ($month) {



            $sql .= " AND SP.salary_month = '$month'";

        }



        if ($school_id) {



            $sql .= " AND SP.school_id = '$school_id'";

        }











        $sql .= $group_by_sql;







        return $this->db->query($sql)->result();

    }



    public function get_student_due_fee_report($school_id, $academic_year_id, $class_id, $student_id) {







        $this->db->select('I.*, SUM(T.amount) AS paid_amount, C.name AS class_name, ST.name AS student,  AY.session_year');



        $this->db->from('invoices AS I');



        $this->db->join('transactions AS T', 'T.invoice_id = I.id', 'left');



        $this->db->join('students AS ST', 'ST.id = I.student_id', 'left');



        $this->db->join('classes AS C', 'C.id = I.class_id', 'left');



        $this->db->join('academic_years AS AY', 'AY.id = I.academic_year_id', 'left');







        if ($school_id != '') {



            $this->db->where('I.school_id', $school_id);

        }







        if ($class_id != '') {



            $this->db->where('I.class_id', $class_id);

        }







        if ($student_id != '') {



            $this->db->where('I.student_id', $student_id);

        }







        if ($academic_year_id) {



            $this->db->where('I.academic_year_id', $academic_year_id);

        }











        $this->db->where('I.paid_status !=', 'paid');



        $this->db->group_by('I.id', 'DESC');







        return $this->db->get()->result();

    }



    public function get_student_fee_collection_report($school_id, $academic_year_id, $class_id, $student_id, $date_from, $date_to) {







        $this->db->select('T.*, T.note,ST.name AS student, C.name AS class_name, AY.session_year');



        $this->db->from('transactions AS T');



        $this->db->join('invoices AS I', 'I.id = T.invoice_id', 'left');



        $this->db->join('students AS ST', 'ST.id = I.student_id', 'left');



        $this->db->join('classes AS C', 'C.id = I.class_id', 'left');



        $this->db->join('academic_years AS AY', 'AY.id = T.academic_year_id', 'left');







        if ($school_id) {



            $this->db->where('T.school_id', $school_id);

        }







        if ($date_from != '' && $date_to != '') {



            $this->db->where('T.payment_date >=', $date_from);



            $this->db->where('T.payment_date <=', $date_to);

        }







        if ($date_from != '' && $date_to == '') {



            $this->db->where('T.payment_date >=', $date_from);

        }







        if ($academic_year_id) {



            $this->db->where('T.academic_year_id', $academic_year_id);

        }







        if ($class_id != '') {



            $this->db->where('I.class_id', $class_id);

        }



        if ($student_id != '') {



            $this->db->where('I.student_id', $student_id);

        }







        return $this->db->get()->result();

    }



    public function get_transaction_report($school_id, $academic_year_id, $date_from, $date_to) {







        $this->db->select('T.*, T.note, AY.session_year');



        $this->db->from('transactions AS T');



        $this->db->join('invoices AS I', 'I.id = T.invoice_id', 'left');



        $this->db->join('academic_years AS AY', 'AY.id = T.academic_year_id', 'left');







        if ($school_id) {



            $this->db->where('T.school_id', $school_id);

        }







        if ($date_from != '' && $date_to != '') {



            $this->db->where('T.payment_date >=', $date_from);



            $this->db->where('T.payment_date <=', $date_to);

        }







        if ($date_from != '' && $date_to == '') {



            $this->db->where('T.payment_date >=', $date_from);

        }







        if ($academic_year_id) {



            $this->db->where('T.academic_year_id', $academic_year_id);

        }







        $this->db->order_by('T.payment_date', 'ASC');



        return $this->db->get()->result();

    }



    public function get_debit_by_date($school_id, $date) {







        $this->db->select('E.amount AS debit, E.note, E.note, H.title AS head');



        $this->db->from('expenditures AS E');



        $this->db->join('expenditure_heads AS H', 'H.id = E.expenditure_head_id', 'left');



        $this->db->where('E.school_id', $school_id);



        $this->db->where('E.date', $date);



        return $this->db->get()->result();

    }



    public function get_credit_by_date($school_id, $date) {







        $this->db->select('T.amount as credit, T.note');



        $this->db->from('transactions AS T');



        $this->db->join('invoices AS I', 'I.id = T.invoice_id', 'left');



        $this->db->where('T.school_id', $school_id);



        $this->db->where('T.payment_date', $date);



        return $this->db->get()->result();

    }



    public function get_student_examresult_report($school_id, $academic_year_id, $class_id, $section_id) {







        $this->db->select('FR.*, G.name AS grade, E.roll_no, ST.name AS student, C.name AS class_name, S.name AS section, AY.session_year');



        $this->db->from('final_results AS FR');



        $this->db->join('enrollments AS E', 'E.student_id = FR.student_id', 'left');



        $this->db->join('students AS ST', 'ST.id = E.student_id', 'left');



        $this->db->join('classes AS C', 'C.id = E.class_id', 'left');



        $this->db->join('sections AS S', 'S.id = E.section_id', 'left');



        $this->db->join('academic_years AS AY', 'AY.id = E.academic_year_id', 'left');



        $this->db->join('grades AS G', 'G.id = FR.grade_id', 'left');











        if ($school_id) {



            $this->db->where('E.school_id', $school_id);

        }







        if ($academic_year_id) {



            $this->db->where('E.academic_year_id', $academic_year_id);

        }







        if ($class_id != '') {



            $this->db->where('E.class_id', $class_id);

        }



        if ($section_id != '') {



            $this->db->where('E.section_id', $section_id);

        }







        $this->db->order_by('FR.avg_grade_point', 'DESC');







        return $this->db->get()->result();

    }



    public function monthlist() {



        $this->db->select()->from('month');

        $listhostel = $this->db->get();

        return $listhostel->result_array();

    }



    public function get_plan_report($month_id, $date_from, $date_to, $apprstatus) {







        // $this->db->select('M.*, P.*,MO.monthname,PR.provincialname,DS.districtname,PT.program_type,PD.program_name,U.username');



        $this->db->select('M.*, P.*,MO.monthname,PR.provincialname,DS.districtname,PT.program_type,PD.program_name');



        $this->db->from('plan_monthlydetails AS M');



        $this->db->join('plan_programme AS P', 'P.prozo_id = M.id', 'left');



        $this->db->join('month AS MO', 'MO.id = M.month', 'left');



        $this->db->join('district AS DS', 'DS.id = M.district_id', 'left');



        $this->db->join('provincial AS PR', 'PR.provincialid = M.provincial_id', 'left');



        $this->db->join('program_type AS PT', 'PT.id = P.program_type', 'left');

//           

        $this->db->join('program_data AS PD', 'PD.id = P.program', 'left');



        //$this->db->join('users AS U', 'U.id = M.user_id', 'left');





        if ($date_from != '' && $date_to != '') {



            $this->db->where('P.proposed_date >=', $date_from);



            $this->db->where('P.proposed_date <=', $date_to);

        }







        if ($date_from != '' && $date_to == '') {



            $this->db->where('P.proposed_date >=', $date_from);

        }





        $this->db->where('M.month', $month_id);



        $this->db->where('M.approvel_status', $apprstatus);



        //   $this->db->where('T.payment_date', $date);              



        return $this->db->get()->result();

    }



    public function get_progress_report($month_id, $date_from, $date_to, $apprstatus) {







        // $this->db->select('M.*, P.*,MO.monthname,PR.provincialname,DS.districtname,PT.program_type,PD.program_name,U.username');



        $this->db->select('M.*, P.*,MO.monthname,PR.provincialname,DS.districtname,PT.program_type,PD.program_name');



        $this->db->from('prozo_monthlydetails AS M');



        $this->db->join('prom_programme AS P', 'P.prozo_id = M.id', 'left');



        $this->db->join('month AS MO', 'MO.id = M.month', 'left');



        $this->db->join('district AS DS', 'DS.id = M.district_id', 'left');



        $this->db->join('provincial AS PR', 'PR.provincialid = M.provincial_id', 'left');



        $this->db->join('program_type AS PT', 'PT.id = P.program_type', 'left');

//           

        $this->db->join('program_data AS PD', 'PD.id = P.program', 'left');



        //$this->db->join('users AS U', 'U.id = M.user_id', 'left');









        if ($date_from != '' && $date_to != '') {



            $this->db->where('P.proposed_date >=', $date_from);



            $this->db->where('P.proposed_date <=', $date_to);

        }







        if ($date_from != '' && $date_to == '') {



            $this->db->where('P.proposed_date >=', $date_from);

        }





        $this->db->where('M.month', $month_id);



        $this->db->where('M.approvel_status', $apprstatus);





        //   $this->db->where('T.payment_date', $date);              



        return $this->db->get()->result();

    }



    public function get_depplan_report($month_id) {







        // $this->db->select('M.*, P.*,MO.monthname,PR.provincialname,DS.districtname,PT.program_type,PD.program_name,U.username');



        $this->db->select('DM.*, DP.*,MO.monthname,R.name');



        $this->db->from('deptplan_monthlydetails AS DM');



        $this->db->join('role AS R', 'R.id = DM.role_id', 'left');



        //$this->db->join('depplan_programme AS DP', 'P.prozo_id = M.id', 'left');



        $this->db->join('month AS MO', 'MO.id = M.month', 'left');



        $this->db->join('department AS DP', 'DP.id = DM.department_id', 'left');



        $this->db->join('provincial AS PR', 'PR.provincialid = M.provincial_id', 'left');



        $this->db->join('program_type AS PT', 'PT.id = P.program_type', 'left');

//           

        $this->db->join('program_data AS PD', 'PD.id = P.program', 'left');



        //$this->db->join('users AS U', 'U.id = M.user_id', 'left');











        $this->db->where('M.month', $month_id);



        //   $this->db->where('T.payment_date', $date);              



        return $this->db->get()->result();

    }



    public function get_subplan_report($month_id, $date_from, $date_to, $apprstatus) {







        // $this->db->select('M.*, P.*,MO.monthname,PR.provincialname,DS.districtname,PT.program_type,PD.program_name,U.username');



        $this->db->select('M.*, P.*,MO.monthname,PT.program_type,PD.program_name');



        $this->db->from('subplan_monthlydetails AS M');



        $this->db->join('subplan_programme AS P', 'P.prozo_id = M.id', 'left');



        $this->db->join('month AS MO', 'MO.id = M.month', 'left');



        //  $this->db->join('district AS DS', 'DS.id = M.district_id', 'left');

        //   $this->db->join('provincial AS PR', 'PR.provincialid = M.provincial_id', 'left');



        $this->db->join('subject_program_type AS PT', 'PT.id = P.program_type', 'left');

//           

        $this->db->join('subject_program_data AS PD', 'PD.id = P.program', 'left');



        //$this->db->join('users AS U', 'U.id = M.user_id', 'left');





        if ($date_from != '' && $date_to != '') {



            $this->db->where('P.proposed_date >=', $date_from);



            $this->db->where('P.proposed_date <=', $date_to);

        }







        if ($date_from != '' && $date_to == '') {



            $this->db->where('P.proposed_date >=', $date_from);

        }





        $this->db->where('M.month', $month_id);



        $this->db->where('M.approvel_status', $apprstatus);



        //   $this->db->where('T.payment_date', $date);              



        return $this->db->get()->result();

    }

    

    public function get_subprogress_report($month_id, $date_from, $date_to, $apprstatus) {







        // $this->db->select('M.*, P.*,MO.monthname,PR.provincialname,DS.districtname,PT.program_type,PD.program_name,U.username');



        $this->db->select('M.*, P.*,MO.monthname,PT.program_type,PD.program_name');



       $this->db->from('subprozo_monthlydetails AS M');



        $this->db->join('subprom_programme AS P', 'P.prozo_id = M.id', 'left');



        $this->db->join('month AS MO', 'MO.id = M.month', 'left');



        //$this->db->join('district AS DS', 'DS.id = M.district_id', 'left');



       //$this->db->join('provincial AS PR', 'PR.provincialid = M.provincial_id', 'left');



        $this->db->join('subject_program_type AS PT', 'PT.id = P.program_type', 'left');

//           

        $this->db->join('subject_program_data AS PD', 'PD.id = P.program', 'left');



        //$this->db->join('users AS U', 'U.id = M.user_id', 'left');







        if ($date_from != '' && $date_to != '') {



            $this->db->where('P.proposed_date >=', $date_from);



            $this->db->where('P.proposed_date <=', $date_to);

        }







        if ($date_from != '' && $date_to == '') {



            $this->db->where('P.proposed_date >=', $date_from);

        }





        $this->db->where('M.month', $month_id);



        $this->db->where('M.approvel_status', $apprstatus);









        //   $this->db->where('T.payment_date', $date);              



        return $this->db->get()->result();

    }

    

    



    public function get_deptplan_report($month_id, $date_from, $date_to, $apprstatus) {







        // $this->db->select('M.*, P.*,MO.monthname,PR.provincialname,DS.districtname,PT.program_type,PD.program_name,U.username');



        $this->db->select('M.*, P.*,MO.monthname,PT.program_type,PD.program_name');



        $this->db->from('deptplan_monthlydetails AS M');



        $this->db->join('depplan_programme AS P', 'P.prozo_id = M.id', 'left');



        $this->db->join('month AS MO', 'MO.id = M.month', 'left');



        //  $this->db->join('district AS DS', 'DS.id = M.district_id', 'left');

        //   $this->db->join('provincial AS PR', 'PR.provincialid = M.provincial_id', 'left');



        $this->db->join('program_type AS PT', 'PT.id = P.program_type', 'left');

//           

        $this->db->join('program_data AS PD', 'PD.id = P.program', 'left');



        //$this->db->join('users AS U', 'U.id = M.user_id', 'left');





        if ($date_from != '' && $date_to != '') {



            $this->db->where('P.proposed_date >=', $date_from);



            $this->db->where('P.proposed_date <=', $date_to);

        }







        if ($date_from != '' && $date_to == '') {



            $this->db->where('P.proposed_date >=', $date_from);

        }





        $this->db->where('M.month', $month_id);



        $this->db->where('M.approvel_status', $apprstatus);



        //   $this->db->where('T.payment_date', $date);              



        return $this->db->get()->result();

    }



    public function get_depprogress_report($month_id, $date_from, $date_to, $apprstatus) {







        // $this->db->select('M.*, P.*,MO.monthname,PR.provincialname,DS.districtname,PT.program_type,PD.program_name,U.username');



        $this->db->select('M.*, P.*,MO.monthname,PR.provincialname,DS.districtname,PT.program_type,PD.program_name');



        $this->db->from('prozo_monthlydetails AS M');



        $this->db->join('prom_programme AS P', 'P.prozo_id = M.id', 'left');



        $this->db->join('month AS MO', 'MO.id = M.month', 'left');



        $this->db->join('district AS DS', 'DS.id = M.district_id', 'left');



        $this->db->join('provincial AS PR', 'PR.provincialid = M.provincial_id', 'left');



        $this->db->join('program_type AS PT', 'PT.id = P.program_type', 'left');

//           

        $this->db->join('program_data AS PD', 'PD.id = P.program', 'left');



        //$this->db->join('users AS U', 'U.id = M.user_id', 'left');















        if ($date_from != '' && $date_to != '') {



            $this->db->where('P.proposed_date >=', $date_from);



            $this->db->where('P.proposed_date <=', $date_to);

        }







        if ($date_from != '' && $date_to == '') {



            $this->db->where('P.proposed_date >=', $date_from);

        }





        $this->db->where('M.month', $month_id);



        $this->db->where('M.approvel_status', $apprstatus);





        //   $this->db->where('T.payment_date', $date);              



        return $this->db->get()->result();

    }



    public function get_school_by_id($id) {





        $this->db->select('schools.id,schools.school_name,schools.school_code,schools.address,provincial.provincialname,district.districtname,zone.zonename,zoneblock.zoneblock,schools.provincial');



        $this->db->from('schools');

        $this->db->join('provincial', 'schools.provincial = provincial.provincialid', 'left');

        $this->db->join('district', 'schools.district_id = district.id', 'left');

        $this->db->join('zone', 'schools.zonal_id = zone.zoneid', 'left');

        $this->db->join('zoneblock', 'schools.educational_id = zoneblock.zoneblockid', 'left');

        $this->db->where('schools.id', $id);

        return $this->db->get()->row();

    }



    

    public function get_annualreportval($id) {





        $this->db->select('annual_report.id,annual_report.sch_year,annual_report.created_at ,schools.school_name,schools.school_code,schools.address');

//       ,provincial.provincialname,district.districtname,zone.zonename,zoneblock.zoneblock,schools.provincial



        $this->db->from('annual_report');

          $this->db->join('schools', 'annual_report.school_id = schools.id', 'left');

//        $this->db->join('provincial', 'schools.provincial = provincial.provincialid', 'left');

//        $this->db->join('district', 'schools.district_id = district.id', 'left');

//        $this->db->join('zone', 'schools.zonal_id = zone.zoneid', 'left');

//        $this->db->join('zoneblock', 'schools.educational_id = zoneblock.zoneblockid', 'left');

        $this->db->where('annual_report.school_id', $id);

        return $this->db->get()->result();

    }

    

    //Monk Student Counts



    public function get_studentMonk() {



        $id = 1;



        $this->db->select('students.id');

        $this->db->from('students');



        //  $this->db->where('students.type_id', $id);

        $this->db->where('students.type_id', $id);

          $query = $this->db->get();

        return $query->num_rows();

//                   return $this->db->get()->row();

    }

    

    

        //Lay Student Counts



    public function get_studentLay() {



        $id = 2;



        $this->db->select('students.id');

        $this->db->from('students');



        //  $this->db->where('students.type_id', $id);

        $this->db->where('students.type_id', $id);

          $query = $this->db->get();

        return $query->num_rows();

//                   return $this->db->get()->row();

    }


    
    public function get_all_piriven_details() {
        $this->db->select('
            S.*,
            P.provincialname,
            D.districtname,
            Z.zonename,
            E.zoneblock
        ');
        $this->db->from('schools as S');
        $this->db->join('provincial as P', 'P.provincialid = S.provincial', 'left');
        $this->db->join('district as D', 'D.id = S.district_id', 'left');
        $this->db->join('zone as Z', 'Z.zoneid = S.zonal_id', 'left');
        $this->db->join('zoneblock as E', 'E.zoneblockid = S.educational_id', 'left');
        
        $this->db->order_by('S.id', 'ASC');
        
        return $this->db->get()->result();
    }
public function get_grade_sums($province_id = null, $district_id = null, $zonal_id = null, $edu_id = null) {
        // Define grade prefixes and categories
        $grades = [
            '0_grade' => 'R10o',
            '1_grade' => 'R10i',
            '2_grade' => 'R10ii',
            '3_grade' => 'R10iii',
            '4_grade' => 'R10iv',
            '5_grade' => 'R10v',
            '6_grade' => 'R10vi',
            '7_grade' => 'R10vii',
            '8_grade' => 'R10viii',
            '9_grade' => 'R10ix',
            '10_grade' => 'R10x',
            '11_grade' => 'R10xi',
            '12_grade' => 'R10xii',
            '13_grade' => 'R10xiii',
            'pracheena_start' => 'R10pS',
            'pracheena_mid' => 'R10pM',
            'pracheena_end' => 'R10pE',
            'v_v_test' => 'R10Vtest',
            'degree' => 'R10Deg',
            'other1' => 'R10Other',
        ];
   
        $fields = ['monk', 'lay', 'total', 'sin', 'pali', 'san', 'thri', 'eng', 'math', 'tam', 'his', 'geo', 'soc', 'gen', 'heal'];
       
        // Build the SELECT statement for sums
        $select_fields = [];
        foreach ($grades as $grade => $prefix) {
            foreach ($fields as $field) {
                $select_fields[] = "SUM(SC.{$prefix}{$field}) AS {$prefix}{$field}";
            }
        }
   
        $this->db->select(implode(', ', $select_fields));
        $this->db->from('student_cal AS SC');
        $this->db->join('schools AS S', 'S.id = SC.school_id', 'left');
   
        // Apply filters
        if ($province_id) {
            $this->db->where('S.provincial', $province_id);
        }
        if ($district_id) {
            $this->db->where('S.district_id', $district_id);
        }
        if ($zonal_id) {
            $this->db->where('S.zonal_id', $zonal_id);
        }
        if ($edu_id) {
            $this->db->where('S.educational_id', $edu_id);
        }
   
        // Ensure data integrity
        $this->db->where('S.status', 1);
   
        return $this->db->get()->row();
    }
    
   public function get_stud_cal_report($province_id = null, $district_id = null, $zonal_id = null, $edu_id = null) {
        $this->db->select('SC.*, S.school_name, S.cencus_number,P.provincialname, DI.districtname, Z.zonename, ZB.zoneblock');
        $this->db->from('student_cal AS SC');
        $this->db->join('schools AS S', 'S.id = SC.school_id', 'left');
        $this->db->join('provincial AS P', 'S.provincial = P.provincialid', 'left');
        $this->db->join('district AS DI', 'S.district_id = DI.id', 'left');
        $this->db->join('zone AS Z', 'S.zonal_id = Z.zoneid', 'left');
        $this->db->join('zoneblock AS ZB', 'S.educational_id = ZB.zoneblockid', 'left');
   
        // Apply filters
        if ($province_id) {
            $this->db->where('S.provincial', $province_id);
        }
        if ($district_id) {
            $this->db->where('S.district_id', $district_id);
        }
        if ($zonal_id) {
            $this->db->where('S.zonal_id', $zonal_id);
        }
        if ($edu_id) {
            $this->db->where('S.educational_id', $edu_id);
        }
   
        // Ensure data integrity
        $this->db->where('S.status', 1);
   
        // Fetch results
        return $this->db->get()->result();
    }

   
    public function get_totals($province_id = null, $district_id = null, $zonal_id = null, $edu_id = null) {
        // Define the categories and prefixes for summation
        $categories = ['monk', 'lay', 'total', 'sin', 'pali', 'san', 'thri', 'eng', 'math', 'tam', 'his', 'geo', 'soc', 'gen', 'heal'];
        $prefixes = ['R10o', 'R10i', 'R10ii', 'R10iii', 'R10iv', 'R10v', 'R10vi', 'R10vii', 'R10viii', 'R10ix', 'R10x', 'R10xi', 'R10xii', 'R10xiii', 'R10pS', 'R10pM', 'R10pE', 'R10Vtest', 'R10Deg', 'R10Other'];
   
        // Build the SUM fields dynamically
        $select_fields = [];
        foreach ($categories as $category) {
            $sum_parts = [];
            foreach ($prefixes as $prefix) {
                $sum_parts[] = "SUM(SC.{$prefix}{$category})";
            }
            $select_fields[] = implode(' + ', $sum_parts) . " AS total" . ucfirst($category);
        }
        $this->db->select(implode(', ', $select_fields));
   
        $this->db->from('student_cal AS SC');
        $this->db->join('schools AS S', 'S.id = SC.school_id', 'left');
   
        // Apply filters
        if ($province_id) {
            $this->db->where('S.provincial', $province_id);
        }
        if ($district_id) {
            $this->db->where('S.district_id', $district_id);
        }
        if ($zonal_id) {
            $this->db->where('S.zonal_id', $zonal_id);
        }
        if ($edu_id) {
            $this->db->where('S.educational_id', $edu_id);
        }
   
        // Ensure data integrity
        $this->db->where('S.status', 1);
   
        // Fetch totals
        return $this->db->get()->row();
    } 
}

