//form validation function 
function validation()
{
	var id = document.getElementById('id').value;
	var subject = document.getElementById('subject').value;
	var filename = document.getElementById('filename').value;
	var file = document.getElementById('file').value;
	var details = document.getElementById('details').value;
 
	//condition 
	if(id !='' && subject !='' && filename !='' && file !='' && details !='')
	{
		if(id =='')
		{
			if(subject =='')
			{
				if(filename =='')
				{
					if(file =='')
					{
						if(details =='')
						{
						   alert('done');
                           return true
						}
						else
						{
                             alert('Enter details');
                             return false;
						}
					}
					else
					{
						alert('Enter Your file')
						return false;
					}
				}
				else
				{
					alert('Enter Your filename');
					return false;
				}
			}
			else
			{
				alert('Enter Your subject');
				return false;
			}
		}
		else
		{
			alert('Enter Your id');
			return false;
		}
	}
