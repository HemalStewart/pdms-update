public function studsub() {
    check_permission(VIEW);

    // Get filter inputs
    $province_id = $this->input->post('provincial_id') ?? '';
    $district_id = $this->input->post('district_id') ?? '';
    $zonal_id = $this->input->post('zonal_id') ?? '';
    $edu_id = $this->input->post('edu_id') ?? '';

    $this->data['provincial'] = $this->provincial;

    // Pass filters to view
    $this->data['filter_prov_id'] = $province_id;
    $this->data['filter_district_id'] = $district_id;
    $this->data['filter_zonal_id'] = $zonal_id;
    $this->data['filter_edu_id'] = $edu_id;

    // Fetch grade-wise aggregated data
    $grade_sums = $this->report->get_grade_sums($province_id, $district_id, $zonal_id, $edu_id);

    $this->data['grades'] = [
        'R10o' => $grade_sums,
        'R10i' => $grade_sums,
        'R10ii' => $grade_sums,
        'R10iii' => $grade_sums,
        'R10iv' => $grade_sums,
        'R10v' => $grade_sums,
        'R10vi' => $grade_sums,
        'R10vii' => $grade_sums,
        'R10viii' => $grade_sums,
        'R10ix' => $grade_sums,
        'R10x' => $grade_sums,
        'R10xi' => $grade_sums,
        'R10xii' => $grade_sums,
        'R10xiii' => $grade_sums,
        'R10pS' => $grade_sums,
        'R10pM' => $grade_sums,
        'R10pE' => $grade_sums,
        'R10Vtest' => $grade_sums,
        'R10Deg' => $grade_sums,
        'R10Other' => $grade_sums,

       
        // Continue for all prefixes...
    ];

    $this->data['report_url'] = site_url('report/studsub');

    $this->layout->title($this->lang->line('student_sub_report') . ' | ' . SMS);
    $this->layout->view('studsubjectreport/index', $this->data);
}

7.add this to Report_Model.php -> application \ modules \ report \ models
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