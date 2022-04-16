<?php


namespace IPS\convert\setup\upg_101007;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !\defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * 4.1.4 Upgrade Code
 */
class _Upgrade
{
	/**
	 * Rename or Create custom_bbcode and bbcode_mediatag
	 *
	 * @return	array	If returns TRUE, upgrader will proceed to next step. If it returns any other value, it will set this as the value of the 'extra' GET parameter and rerun this step (useful for loops)
	 */
	public function step1()
	{
		if ( !\IPS\Db::i()->checkForTable( 'convert_custom_bbcode' ) )
		{
			if ( \IPS\Db::i()->checkForTable( 'custom_bbcode' ) )
			{
				\IPS\Db::i()->renameTable( 'custom_bbcode', 'convert_custom_bbcode' );
			}
			else
			{			
				\IPS\Db::i()->createTable( array (
					'name'		=> 'convert_custom_bbcode',
					'columns'	=> array(
						'bbcode_id' => array(
							'allow_null'		=> false,
							'auto_increment'	=> true,
							'binary'			=> false,
							'comment'			=> '',
							'decimals'			=> NULL,
							'default'			=> NULL,
							'length'			=> 10,
							'name'				=> 'bbcode_id',
							'type'				=> 'INT',
							'unsigned'			=> false,
							'values'			=> array(),
							'zerofill'			=> false,
						),
						'bbcode_title' => array(
							'allow_null'		=> false,
							'auto_increment'	=> false,
							'binary'			=> false,
							'comment'			=> '',
							'decimals'			=> NULL,
							'default'			=> '',
							'length'			=> 255,
							'name'				=> 'bbcode_title',
							'type'				=> 'VARCHAR',
							'unsigned'			=> false,
							'values'			=> array (),
							'zerofill'			=> false,
						),
						'bbcode_desc' => array(
							'allow_null'		=> true,
							'auto_increment'	=> false,
							'binary'			=> false,
							'comment'			=> '',
							'decimals'			=> NULL,
							'default'			=> NULL,
							'length'			=> 0,
							'name'				=> 'bbcode_desc',
							'type'				=> 'TEXT',
							'unsigned'			=> false,
							'values'			=> array(),
							'zerofill'			=> false,
						),
						'bbcode_tag' => array(
							'allow_null'		=> false,
							'auto_increment'	=> false,
							'binary'			=> false,
							'comment'			=> '',
							'decimals'			=> NULL,
							'default'			=> '',
							'length'			=> 255,
							'name'				=> 'bbcode_tag',
							'type'				=> 'VARCHAR',
							'unsigned'			=> false,
							'values'			=> array(),
							'zerofill'			=> false,
						),
						'bbcode_replace' => array(
							'allow_null'		=> true,
							'auto_increment'	=> false,
							'binary'			=> false,
							'comment'			=> '',
							'decimals'			=> NULL,
							'default'			=> NULL,
							'length'			=> 0,
							'name'				=> 'bbcode_replace',
							'type'				=> 'TEXT',
							'unsigned'			=> false,
							'values'			=> array(),
							'zerofill'			=> false,
						),
						'bbcode_useoption' => array(
							'allow_null'		=> false,
							'auto_increment'	=> false,
							'binary'			=> false,
							'comment'			=> '',
							'decimals'			=> NULL,
							'default'			=> '0',
							'length'			=> 1,
							'name'				=> 'bbcode_useoption',
							'type'				=> 'TINYINT',
							'unsigned'			=> false,
							'values'			=> array(),
							'zerofill'			=> false,
						),
						'bbcode_example' => array(
							'allow_null'		=> true,
							'auto_increment'	=> false,
							'binary'			=> false,
							'comment'			=> '',
							'decimals'			=> NULL,
							'default'			=> NULL,
							'length'			=> 0,
							'name'				=> 'bbcode_example',
							'type'				=> 'TEXT',
							'unsigned'			=> false,
							'values'			=> array(),
							'zerofill'			=> false,
						),
						'bbcode_switch_option' => array(
							'allow_null' => false,
							'auto_increment' => false,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => '0',
							'length' => 1,
							'name' => 'bbcode_switch_option',
							'type' => 'INT',
							'unsigned' => false,
							'values' => array(),
							'zerofill' => false,
						),
						'bbcode_menu_option_text' => array(
							'allow_null' => false,
							'auto_increment' => false,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => '',
							'length' => 200,
							'name' => 'bbcode_menu_option_text',
							'type' => 'VARCHAR',
							'unsigned' => false,
							'values' => array(),
							'zerofill' => false,
						),
						'bbcode_menu_content_text' => array(
							'allow_null' => false,
							'auto_increment' => false,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => '',
							'length' => 200,
							'name' => 'bbcode_menu_content_text',
							'type' => 'VARCHAR',
							'unsigned' => false,
							'values' => array(),
							'zerofill' => false,
						),
						'bbcode_single_tag' => array(
							'allow_null' => false,
							'auto_increment' => false,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => '0',
							'length' => 1,
							'name' => 'bbcode_single_tag',
							'type' => 'TINYINT',
							'unsigned' => false,
							'values' => array(),
							'zerofill' => false,
						),
						'bbcode_groups' => array(
							'allow_null' => true,
							'auto_increment' => false,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => NULL,
							'length' => 255,
							'name' => 'bbcode_groups',
							'type' => 'VARCHAR',
							'unsigned' => false,
							'values' => array(),
							'zerofill' => false,
						),
						'bbcode_sections' => array(
							'allow_null' => true,
							'auto_increment' => false,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => NULL,
							'length' => 255,
							'name' => 'bbcode_sections',
							'type' => 'VARCHAR',
							'unsigned' => false,
							'values' => array(),
							'zerofill' => false,
						),
						'bbcode_php_plugin' => array(
							'allow_null' => true,
							'auto_increment' => false,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => NULL,
							'length' => 255,
							'name' => 'bbcode_php_plugin',
							'type' => 'VARCHAR',
							'unsigned' => false,
							'values' => array(),
							'zerofill' => false,
						),
						'bbcode_no_parsing' => array(
							'allow_null' => false,
							'auto_increment' => false,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => '0',
							'length' => 1,
							'name' => 'bbcode_no_parsing',
							'type' => 'TINYINT',
							'unsigned' => false,
							'values' => array(),
							'zerofill' => false,
						),
						'bbcode_protected' => array(
							'allow_null' => false,
							'auto_increment' => false,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => '0',
							'length' => 1,
							'name' => 'bbcode_protected',
							'type' => 'TINYINT',
							'unsigned' => false,
							'values' => array(),
							'zerofill' => false,
						),
						'bbcode_aliases' => array(
							'allow_null' => true,
							'auto_increment' => false,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => NULL,
							'length' => 255,
							'name' => 'bbcode_aliases',
							'type' => 'VARCHAR',
							'unsigned' => false,
							'values' => array(),
							'zerofill' => false,
						),
						'bbcode_optional_option' => array(
							'allow_null' => false,
							'auto_increment' => false,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => '0',
							'length' => 1,
							'name' => 'bbcode_optional_option',
							'type' => 'TINYINT',
							'unsigned' => false,
							'values' => array (),
							'zerofill' => false,
						),
						'bbcode_image' => array(
							'allow_null' => true,
							'auto_increment' => false,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => NULL,
							'length' => 255,
							'name' => 'bbcode_image',
							'type' => 'VARCHAR',
							'unsigned' => false,
							'values' => array(),
							'zerofill' => false,
						),
						'bbcode_app' => array(
							'allow_null' => false,
							'auto_increment' => false,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => '',
							'length' => 50,
							'name' => 'bbcode_app',
							'type' => 'VARCHAR',
							'unsigned' => false,
							'values' => array(),
							'zerofill' => false,
						),
						'bbcode_custom_regex' => array(
							'allow_null' => true,
							'auto_increment' => false,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => NULL,
							'length' => 0,
							'name' => 'bbcode_custom_regex',
							'type' => 'TEXT',
							'unsigned' => false,
							'values' => array(),
							'zerofill' => false,
						),
					),
					'indexes' => array(
					    'PRIMARY' => array(
							'type' => 'primary',
							'name' => 'PRIMARY',
							'length' => array( 0 => NULL ),
							'columns' => array( 0 => 'bbcode_id' ),
						),
					)
				) );
			}
		}
		
		if ( !\IPS\Db::i()->checkForTable( 'convert_bbcode_mediatag' ) )
		{
			if ( \IPS\Db::i()->checkForTable( 'bbcode_mediatag' ) )
			{
				\IPS\Db::i()->renameTable( 'bbcode_mediatag', 'convert_bbcode_mediatag' );
			}
			else
			{
				\IPS\Db::i()->createTable( array(
					'name' => 'convert_bbcode_mediatag',
					'columns' => array(
						'mediatag_id' => array(
							'allow_null' => false,
							'auto_increment' => true,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => NULL,
							'length' => 10,
							'name' => 'mediatag_id',
							'type' => 'SMALLINT',
							'unsigned' => true,
							'values' => array(),
							'zerofill' => false,
						),
						'mediatag_name' => array(
							'allow_null' => false,
							'auto_increment' => false,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => '',
							'length' => 255,
							'name' => 'mediatag_name',
							'type' => 'VARCHAR',
							'unsigned' => false,
							'values' => array(),
							'zerofill' => false,
						),
						'mediatag_match' => array(
							'allow_null' => true,
							'auto_increment' => false,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => NULL,
							'length' => 0,
							'name' => 'mediatag_match',
							'type' => 'TEXT',
							'unsigned' => false,
							'values' => array(),
							'zerofill' => false,
						),
						'mediatag_replace' => array(
							'allow_null' => true,
							'auto_increment' => false,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => NULL,
							'length' => 0,
							'name' => 'mediatag_replace',
							'type' => 'TEXT',
							'unsigned' => false,
							'values' => array(),
							'zerofill' => false,
						),
						'mediatag_position' => array(
							'allow_null' => false,
							'auto_increment' => false,
							'binary' => false,
							'comment' => '',
							'decimals' => NULL,
							'default' => '0',
							'length' => 6,
							'name' => 'mediatag_position',
							'type' => 'SMALLINT',
							'unsigned' => false,
							'values' => array(),
							'zerofill' => false,
						),
					),
					'indexes' => array(
						'PRIMARY' => array(
							'type' => 'primary',
							'name' => 'PRIMARY',
							'length' => array( 0 => NULL ),
							'columns' => array( 0 => 'mediatag_id' ),
						),
					)
				) );
			}
		}
		return TRUE;
	}
}