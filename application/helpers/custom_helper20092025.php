<?php 

function get_user_message_counts() {
    $CI =& get_instance();
    $user_id = $CI->session->userdata('id');
    $role_id = $CI->session->userdata('role_id');

    if (!$user_id) {
        return ['inbox' => 0, 'new' => 0, 'sent' => 0, 'draft' => 0, 'trash' => 0];
    }
    
    $inbox_count = 0;
    $new_count = 0;
    $sent_count = 0;
    $draft_count = 0;
    $trash_count = 0;
    
    $CI->db->reset_query();

    $CI->db->select('COUNT(p.id) as inbox_count, SUM(CASE WHEN pr.is_read = 0 THEN 1 ELSE 0 END) as new_count');
    $CI->db->from('postoffice AS p');
    $CI->db->join('postoffice_relationships AS pr', 'p.id = pr.message_id');
    $CI->db->where('p.receiver_id', $user_id);
    $CI->db->where('pr.owner_id', $user_id);
    $CI->db->where('pr.is_draft', 0);
    $CI->db->where('pr.is_trash', 0);
    $CI->db->group_by('p.id');
    $inbox_query_result = $CI->db->get()->result();

    if ($inbox_query_result) {
        $inbox_count = count($inbox_query_result);
        foreach ($inbox_query_result as $row) {
            $new_count += $row->new_count;
        }
    }
    $CI->db->reset_query();

    if ($role_id == SUPER_ADMIN) {
        $CI->db->select('p.id');
        $CI->db->from('postoffice AS p');
        $CI->db->join(
            'postoffice_relationships AS pr',
            'p.id = pr.message_id AND (pr.owner_id = p.created_by AND pr.is_trash = 1)',
            'left'
        );
        $CI->db->where('pr.id IS NULL');
        $CI->db->where_not_in('p.id', '(SELECT message_id FROM postoffice_relationships WHERE is_draft = 1)', FALSE);
        $CI->db->where('p.parent_id', 0);
        $sent_count = $CI->db->count_all_results();
    } elseif ($role_id == 31) {
        $CI->db->select('p.id');
        $CI->db->from('postoffice AS p');
        $CI->db->join('postoffice_relationships AS pr', 'p.id = pr.message_id');
        $CI->db->where('p.created_by', $user_id);
        $CI->db->where('pr.owner_id', $user_id);
        $CI->db->where('pr.is_trash', 0);
        $CI->db->where('pr.is_draft', 0);
        $CI->db->group_by('p.id');
        $sent_count = $CI->db->get()->num_rows();
    } else {
        $CI->db->select('p.id');
        $CI->db->from('postoffice AS p');
        $CI->db->join('postoffice_relationships AS pr', 'p.id = pr.message_id');
        $CI->db->where('pr.owner_id', $user_id);
        $CI->db->where('pr.sender_id', $user_id);
        $CI->db->where('pr.is_draft', 0);
        $CI->db->where('pr.is_trash', 0);
        $CI->db->group_by('p.id');
        $sent_count = $CI->db->get()->num_rows();
    }
    $CI->db->reset_query();

    $CI->db->select('id');
    $CI->db->from('postoffice_relationships');
    $CI->db->where('owner_id', $user_id);
    $CI->db->where('is_draft', 1);
    $CI->db->where('is_trash', 0);
    $draft_count = $CI->db->count_all_results();
    $CI->db->reset_query();

    $CI->db->select('id');
    $CI->db->from('postoffice_relationships');
    $CI->db->where('owner_id', $user_id);
    $CI->db->where('is_trash', 1);
    $trash_count = $CI->db->count_all_results();
    $CI->db->reset_query();

    return [
        'inbox' => $inbox_count,
        'new' => $new_count,
        'sent' => $sent_count,
        'draft' => $draft_count,
        'trash' => $trash_count
    ];
}

/* This function can find a user's name from any of the profile tables */
if (!function_exists('get_user_name_by_id')) {
    function get_user_name_by_id($user_id)
    {
        $ci = &get_instance();
        if (!$user_id) { return null; }

        $ci->db->select("
            CASE 
                WHEN T.user_id IS NOT NULL THEN T.name
                WHEN D.user_id IS NOT NULL THEN D.name
                WHEN G.user_id IS NOT NULL THEN G.name
                WHEN SA.user_id IS NOT NULL THEN SA.name
                WHEN E.user_id IS NOT NULL THEN E.name
                ELSE U.username
            END AS name", false);
        $ci->db->from('users AS U');
        $ci->db->join('teachers AS T', 'T.user_id = U.id', 'left');
        $ci->db->join('department_dir AS D', 'D.user_id = U.id', 'left');
        $ci->db->join('guardians AS G', 'G.user_id = U.id', 'left');
        $ci->db->join('system_admin AS SA', 'SA.user_id = U.id', 'left');
        $ci->db->join('employees AS E', 'E.user_id = U.id', 'left');
        $ci->db->where('U.id', $user_id);
        
        $query = $ci->db->get();
        return ($query->num_rows() > 0) ? $query->row() : null;
    }
}

if (!function_exists('get_user_role')) {
    function get_user_role($role_id)
    {
        $ci = &get_instance();
        $ci->db->select('name');
        $ci->db->from('roles');
        $ci->db->where('id', $role_id);
        $role = $ci->db->get()->row();
        return $role;
    }
}