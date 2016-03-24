import sys

if(len(sys.argv ) > 1):
	arr = list(sys.argv[1])
	tmpsum = int(arr[0])*7 + int(arr[1])*9 + int(arr[2])*10 + int(arr[3])*5 + int(arr[4])*8 \
	        + int(arr[5])*4 + int(arr[6])*2 + int(arr[7])*1 + int(arr[8])*6 + int(arr[9])*3 \
	        + int(arr[10])*7 + int(arr[11])*9 + int(arr[12])*10 + int(arr[13])*5 \
	        + int(arr[14])*8 + int(arr[15])*4 + int(arr[16])*2
	 
	remainder = tmpsum % 11

	maptable = {0: '1', 1: '0', 2: 'x', 3: '9', 4: '8', 5: '7', 6: '6', 7: '5', 8: '4', 9: '3', 10: '2'}
	if maptable[remainder] == arr[17]:
	    print('True')