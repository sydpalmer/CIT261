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

function loadStory(){
    //pg config
var pg = require('pg');

const connectionString = 'postgres://postgres:SydGrad2014@localhost:5432/StoriesDB';

var client = new pg.Client(connectionString);

	client.connect(function(err) {
		if (err) {
			console.log("Error connecting to DB: ");
			console.log(err);
			callback(err, null);
    }
    var sql = "SELECT * FROM stories";

    var query = client.query(sql);
    query.on("row", function(row,result){

      result.addRow(row);
      
    });
});
}