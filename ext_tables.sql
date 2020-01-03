#
# Table structure for table 'tx_parser_domain_model_parser'
#
CREATE TABLE tx_parser_domain_model_parser (

	request varchar(255) DEFAULT '' NOT NULL,
	p_link int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_parser_domain_model_response'
#
CREATE TABLE tx_parser_domain_model_response (

	parser int(11) unsigned DEFAULT '0' NOT NULL,

	result varchar(255) DEFAULT '' NOT NULL,
	r_link int(11) unsigned DEFAULT '0',

);

#
# Table structure for table 'tx_parser_domain_model_response'
#
CREATE TABLE tx_parser_domain_model_response (

	parser int(11) unsigned DEFAULT '0' NOT NULL,

);
