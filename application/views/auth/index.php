<!DOCTYPE html>
<html>
    <head>
        <title>Flash Card Game - Login</title>
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="headerText"><?php echo lang('index_heading'); ?></div>
                <div class="logOut">
					<?php
					if ($this->ion_auth->logged_in()) {
						$user = $this->ion_auth->user()->row();
						$userName = $user->first_name;
						echo "Logg out: " . anchor('game/logout', $userName);
					}
					?>
                </div>
            </div>
            <div class="userIndexFormHolder">
                <table cellpadding=0 cellspacing=10>
                    <tr>
                        <th><?php echo lang('index_fname_th'); ?></th>
                        <th><?php echo lang('index_lname_th'); ?></th>
                        <th><?php echo lang('index_email_th'); ?></th>
                        <th><?php echo lang('index_groups_th'); ?></th>
                        <th><?php echo lang('index_status_th'); ?></th>
                        <th><?php echo lang('index_action_th'); ?></th>
                    </tr>
					<?php foreach ($users as $user): ?>
						<tr>
							<td><?php echo $user->first_name; ?></td>
							<td><?php echo $user->last_name; ?></td>
							<td><?php echo $user->email; ?></td>
							<td>
								<?php foreach ($user->groups as $group): ?>
									<?php echo anchor("auth/edit_group/" . $group->id, $group->name); ?><br />
								<?php endforeach ?>
							</td>
							<td><?php echo ($user->active) ? anchor("auth/deactivate/" . $user->id, lang('index_active_link')) : anchor("auth/activate/" . $user->id, lang('index_inactive_link')); ?></td>
							<td><?php echo anchor("auth/edit_user/" . $user->id, 'Edit'); ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
				<p><?php echo anchor('auth/create_user', lang('index_create_user_link')) ?>  <?php /* echo anchor('auth/create_group', lang('index_create_group_link')) */ ?>| <?php echo anchor('', 'Admin Home') ?></p>
				<div id="infoMessage"><?php echo $message; ?>       </div>
            </div>
        </div>
    </body>
</html>