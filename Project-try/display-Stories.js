function AddRecord() {
    console.log("Inside the add record function");
    
}

function EditRecord() {
  var adoConn = new ActiveXObject("ADODB.Connection");
  var adoRS = new ActiveXObject("ADODB.Recordset");

  adoConn.Open("Provider=Microsoft.Jet.OLEDB.4.0;Data Source='\\CIT261-Stories.mdb'");
  adoRS.Open("Select * From Table1 Where FieldName = 'Quentin'", adoConn, 1, 3);

  adoRS.Edit;
  adoRS.Fields("Author").value = "New Name";
  adoRS.Update;

  adoRS.Close();
  adoConn.Close();
}