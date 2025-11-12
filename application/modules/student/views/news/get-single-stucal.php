<?php
$stucal_rows = array(
    array('sl' => '01', 'label' => $this->lang->line('0_grade'), 'prefix' => 'R10o'),
    array('sl' => '02', 'label' => $this->lang->line('1_grade'), 'prefix' => 'R10i'),
    array('sl' => '03', 'label' => $this->lang->line('2_grade'), 'prefix' => 'R10ii'),
    array('sl' => '04', 'label' => $this->lang->line('3_grade'), 'prefix' => 'R10iii'),
    array('sl' => '05', 'label' => $this->lang->line('4_grade'), 'prefix' => 'R10iv'),
    array('sl' => '06', 'label' => $this->lang->line('5_grade'), 'prefix' => 'R10v'),
    array('sl' => '07', 'label' => $this->lang->line('6_grade'), 'prefix' => 'R10vi'),
    array('sl' => '08', 'label' => $this->lang->line('7_grade'), 'prefix' => 'R10vii'),
    array('sl' => '09', 'label' => $this->lang->line('8_grade'), 'prefix' => 'R10viii'),
    array('sl' => '10', 'label' => $this->lang->line('9_grade'), 'prefix' => 'R10ix'),
    array('sl' => '11', 'label' => $this->lang->line('10_grade'), 'prefix' => 'R10x'),
    array('sl' => '12', 'label' => $this->lang->line('11_grade'), 'prefix' => 'R10xi'),
    array('sl' => '13', 'label' => $this->lang->line('12_grade'), 'prefix' => 'R10xii'),
    array('sl' => '14', 'label' => $this->lang->line('13_grade'), 'prefix' => 'R10xiii'),
    array('sl' => '15', 'label' => $this->lang->line('pracheena_start'), 'prefix' => 'R10pS'),
    array('sl' => '16', 'label' => $this->lang->line('pracheena_mid'), 'prefix' => 'R10pM'),
    array('sl' => '17', 'label' => $this->lang->line('pracheena_end'), 'prefix' => 'R10pE'),
    array('sl' => '18', 'label' => $this->lang->line('v_v_test'), 'prefix' => 'R10Vtest'),
    array('sl' => '19', 'label' => $this->lang->line('degree'), 'prefix' => 'R10Deg'),
    array('sl' => '20', 'label' => $this->lang->line('other1'), 'prefix' => 'R10Other')
);

$stucal_columns = array('monk', 'lay', 'sin', 'pali', 'san', 'thri', 'eng', 'math', 'tam', 'his', 'geo', 'soc', 'gen', 'heal');
$stucal_subject_columns = array_slice($stucal_columns, 2);
$stucal_totals = array_fill_keys($stucal_columns, 0);

if (!function_exists('pdms_stucal_format_value')) {
    function pdms_stucal_format_value($value) {
        if ($value === '' || $value === null) {
            return '';
        }

        if (is_numeric($value)) {
            $numeric = 0 + $value;
            return ((int) $numeric === $numeric) ? (int) $numeric : $numeric;
        }

        return $value;
    }
}
?>
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

    <tbody>

        <tr>

            <th width="10%"><?php echo $this->lang->line('school_name'); ?></th>

            <th colspan="16"><?php echo $news->school_name; ?> - <?php echo $news->cencus_number; ?></th>

        </tr>

        <tr>
            <th><?php echo $this->lang->line('sl_no'); ?></th>
            <th><?php echo $this->lang->line('grade_year'); ?></th>
            <th colspan="15"><?php echo $this->lang->line('stu_count'); ?></th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th><?php echo $this->lang->line('monk'); ?></th>
            <th><?php echo $this->lang->line('lay'); ?></th>
            <th><?php echo $this->lang->line('count'); ?> </th>
            <th><?php echo $this->lang->line('sinhala'); ?></th>
            <th><?php echo $this->lang->line('pali'); ?></th>
            <th><?php echo $this->lang->line('sanskrit'); ?></th>
            <th><?php echo $this->lang->line('thripitaka_damma'); ?></th>
            <th><?php echo $this->lang->line('english'); ?></th>
            <th><?php echo $this->lang->line('maths'); ?></th>
            <th><?php echo $this->lang->line('tamil1'); ?></th>
            <th><?php echo $this->lang->line('history'); ?></th>
            <th><?php echo $this->lang->line('geography'); ?></th>
            <th><?php echo $this->lang->line('social_s'); ?></th>
            <th><?php echo $this->lang->line('general_s'); ?></th>
            <th><?php echo $this->lang->line('health'); ?></th>
        </tr>

        <?php foreach ($stucal_rows as $stucal_row) : ?>
            <?php
                $stucal_row_values = array();
                foreach ($stucal_columns as $stucal_column) {
                    $field_name = $stucal_row['prefix'] . $stucal_column;
                    $value = isset($news->$field_name) ? $news->$field_name : '';
                    $stucal_row_values[$stucal_column] = $value;
                    $stucal_totals[$stucal_column] += is_numeric($value) ? (float) $value : 0;
                }

                $stucal_row_total_value = (is_numeric($stucal_row_values['monk']) ? (float) $stucal_row_values['monk'] : 0)
                    + (is_numeric($stucal_row_values['lay']) ? (float) $stucal_row_values['lay'] : 0);
                $stucal_row_total = ($stucal_row_values['monk'] === '' && $stucal_row_values['lay'] === '' && $stucal_row_total_value == 0)
                    ? ''
                    : $stucal_row_total_value;
            ?>
            <tr>
                <td><?php echo $stucal_row['sl']; ?></td>
                <td><?php echo $stucal_row['label']; ?></td>
                <td><?php echo pdms_stucal_format_value($stucal_row_values['monk']); ?></td>
                <td><?php echo pdms_stucal_format_value($stucal_row_values['lay']); ?></td>
                <td><?php echo pdms_stucal_format_value($stucal_row_total); ?></td>
                <?php foreach ($stucal_subject_columns as $stucal_subject_column) : ?>
                    <td><?php echo pdms_stucal_format_value($stucal_row_values[$stucal_subject_column]); ?></td>
                <?php endforeach; ?>
            </tr>

        <?php endforeach; ?>

        <?php $stucal_grand_total = $stucal_totals['monk'] + $stucal_totals['lay']; ?>
        <tr>
            <td>*</td>
            <td><?php echo $this->lang->line('count'); ?></td>
            <td><?php echo pdms_stucal_format_value($stucal_totals['monk']); ?></td>
            <td><?php echo pdms_stucal_format_value($stucal_totals['lay']); ?></td>
            <td><?php echo pdms_stucal_format_value($stucal_grand_total); ?></td>
            <?php foreach ($stucal_subject_columns as $stucal_subject_column) : ?>
                <td><?php echo pdms_stucal_format_value($stucal_totals[$stucal_subject_column]); ?></td>
            <?php endforeach; ?>
        </tr>


    </tbody>

</table>



