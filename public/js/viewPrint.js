function Clean4Print( tag_id )
{
	var ref = document.getElementById( tag_id );
	//var print = window.print();
	clean_popup = window.document.open( "about:blank","","");
  	clean_popup.document.write('<html>\n<head>\n<title>'+document.title+'</title>\n<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">\n<link href="styles.css" rel="stylesheet" type="text/css">\n</head>\n');
  	clean_popup.document.write('<body style="background-color:#FFFFFF"><table width="850" cellspacing="0" cellpadding="1" align="center"  bgcolor="#FFFFFF" class="tabborder"><tr><td colspan="3" align="center" style="padding-top:10px; font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#000000"><strong>Vemulawada Temple</strong></td></tr><tr><td colspan="3">' );

	// output all sections marked with tag_id
	while (ref!=null)
	{
		clean_popup.document.write( ref.innerHTML + '\n' );
		ref = ref.nextSibling;
	}
    /*clean_popup.document.write("<SCRIPT LANGUAGE='JavaScript'>" + print + ";</script>");*/
	clean_popup.document.write('</td></tr></table></body>\n</html>\n');
	clean_popup.print(); 
   clean_popup.document.close(); 
  //clean_popup.close(); 
}