function extractText(form){

	var para = form.myText.value;
	var paraLower = para.toLowerCase();

	//ignore common words here
	var firstRun = cleanse(paraLower);
	var secondRun = cleanse(firstRun);
	var res = secondRun.split(" ");
	result = makeObj(res);
	var newR = sortObj(result, 'value');
	document.getElementById("leftcolumn").innerHTML = print_table(newR,"Words", "Scores");

	var val = Object.keys(newR).map(function (key) {
		return newR[key]
	});
	var str1 = findMedian(newR);
	var str2 =  findMode(newR);
	var str3 = findMean(newR);
	var str4 = standardDeviation(val);
	var stats = {
		Median: str1,
		Mode: str2,
		Mean: str3,
		Standard_Deviation: str4
	};
	document.getElementById("rightcolumn").innerHTML = print_table(stats, "Functions", "Results");
	return false;

}//extractForm

cleanse = function(wrds){
	var commonWords = {" (":" ", ") ":" ", " ":" ",".":" ",", ":" ","  ":" ",". ":" "," the ":" ", " it ":" "," his ":" "," her ":" "," a ":" "," be ":" "," i ":" "," in ":" "," not ":" "," there ":" ",
                        " is ":" "," are ":" "," was ":" "," were ":" "," this ":" "," that ":" "," and ":" "," has ":" ",
                        " had ":" "," to ":" "," you ":" "," me ":" "," at ":" "," so ":" "};
 	for(var val in commonWords){
	  	wrds = wrds.split(val).join(commonWords[val]);
 	}
 	return wrds;
}

makeObj = function(arr){
	result = {};
	for(i = 0; i < arr.length; ++i) {
	    if(!result[arr[i]])
	        result[arr[i]] = 0;
	    ++result[arr[i]];
	}
	return result;
}

print_table = function(obj, title1, title2){

	 var table = '';
	 table += '<tr>';
	   table += '<th height="50">' + title1 + '</th>';
	   table += '<th height="50">' + title2 + '</th>';
	 table += '</tr>';
	for(var key in obj){

		table += '<tr>';
			table += '<td height="40">' + key + '</td>';
			table += '<td height="40">' + obj[key] + '</td>';
		table += '</tr>';
	}//end forin

	table += '<table border=2 table width="400" class="table table-bordered table-striped table-hover">' + table + '</table>';

	return table;

}
sortObj = function(obj, type) { //converts to array, sort ascending, re-convert to object
	var temp_array = [];
	for (var key in obj) {
		if (obj.hasOwnProperty(key)) {
			temp_array.push(key);
		}
	}
	temp_array.sort(function(a,b) {
		var x = obj[a];
		var y = obj[b];
		return ((x < y) ? -1 : ((x > y) ? 1 : 0));
	});

	var temp_obj = {};
	for (var i=0; i<temp_array.length; i++) {
		temp_obj[temp_array[i]] = obj[temp_array[i]];
	}
	return temp_obj;
};

findMedian = function(obj){
	var temp_array = [];
	for (var key in obj) {
		if (obj.hasOwnProperty(key)) {
			temp_array.push(key);
		}
	}

	var half = Math.floor((temp_array.length-1)/2);

    if(temp_array.length % 2 == 0){
        var mid1 = temp_array[half+1];
        var mid2 = temp_array[half];

        //return mid1 + " and " + mid2;
        var med1 = getVal(obj,mid1);//temp_array.pop();
		var med2 = getVal(obj,mid2);
	   	return mid1 + " appeared " + med1 + " time(s)" +  " and " + mid2 + " appeared " + med2 + " time(s).";
	}
    else{
    	var mid = temp_array[half];
    	var med = getVal(obj,mid);
    	return mid + " appeared " + med + " time(s).";
    }
}

findMode = function(obj){
	var temp_array = [];
	for (var key in obj) {
		if (obj.hasOwnProperty(key)) {
			temp_array.push(key);
		}
	}

	var mode = temp_array.pop();
	var val = getVal(obj,mode);
   	return mode + " appeared " + val + " time(s).";//temp_array.pop();
   	//since values are sorted ascending, last number entered should be the mode
}

findMean = function(obj){
	var temp_array = [];
	var sum = 0;
	for (var key in obj) {
		if (obj.hasOwnProperty(key)) {
			sum+=obj[key];
			temp_array.push(obj[key]);
			
		}
	}
	var len = temp_array.length;
	return (sum/len);
}

getVal = function(obj, Findkey){
	for(var key in obj){
		if(key == Findkey)
			return obj[key];
	}
	return false;
}

function standardDeviation(values){
	var avg = average(values);
  
  	var squareDiffs = values.map(function(value){
	    var diff = value - avg;
	    var sqrDiff = diff * diff;
	    return sqrDiff;
    });
  
    var avgSquareDiff = average(squareDiffs);
	var stdDev = Math.sqrt(avgSquareDiff);
    return stdDev;
}

function average(data){
  var sum = data.reduce(function(sum, value){
    return sum + value;
  }, 0);

  var avg = sum / data.length;
  return avg;
}

function searchKeyPress(e)//to press enter in textarea and submit form
{
    e = e || window.event;
    if (e.keyCode == 13)
    {
        document.getElementById('btn').click();
        return false;
    }
    return true;
}