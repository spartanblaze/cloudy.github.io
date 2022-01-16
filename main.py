#!C:\Python3.9\python.exe
import cgi
from email.mime import image
print ("content-type:text/html\r\n\r\n")
print('<html>')
print('<head>')
print('</head>')
print('<body>')
print('<ul>')
print('<li><a href="welcome.php">Home</a></li></b></li>')
print('<li><a href="forecast.html">Forecast</a></li></b></li>')
print('<li><a href="pastdata.html">Past Data</a></li></b></li>')
print('<li><a href="about.html">About</a></li></b></li>')
print('<li><a href="logout.php">Logout</a></li></b></li>')
print('<ul>')
print('<center>')
print('<h1> Prediction using Machine Learning Algorithm "Linear Regression"</h1>')
print('</center>')
print('<img src="images/graph.png">')
print('</body>')
print('<html>')
import pandas as pd
import numpy as np
import sklearn as sk
from sklearn.linear_model import LinearRegression
import matplotlib.pyplot as plt

# read the cleaned data
data = pd.read_csv("weather_final.csv")

X = data.drop(['PrecipitationSumInches'], axis=1)

Y = data['PrecipitationSumInches']
Y = Y.values.reshape(-1, 1)

day_index = 798
days = [i for i in range(Y.size)]

clf = LinearRegression()
clf.fit(X, Y)

inp = np.array([[74], [60], [45], [67], [49], [43], [33], [45],
                [57], [29.68], [10], [7], [2], [0], [20], [4], [31]])

inp = inp.reshape(1, -1)

# Print output
print('The precipitation in inches for the input is:', clf.predict(inp))

print('The precipitation trend graph: ')
plt.scatter(days, Y, color='g')
plt.scatter(days[day_index], Y[day_index], color='r')
plt.title('Precipitation level')
plt.xlabel('Days')
plt.ylabel('Precipitation in inches')

# Plot a graph of precipitation levels vs n# of days
#plt.show()


x_f = X.filter(['TempAvgF', 'DewPointAvgF', 'HumidityAvgPercent',
                'SeaLevelPressureAvgInches', 'VisibilityAvgMiles',
                'WindAvgMPH'], axis=1)
print('Preciptiation Vs Selected Attributes Graph: ')
for i in range(x_f.columns.size):
    plt.subplot(3, 2, i+1)
    plt.scatter(days, x_f[x_f.columns.values[i][:100]], color='g')
    plt.scatter(days[day_index], x_f[x_f.columns.values[i]]
                [day_index], color='r')
    plt.title(x_f.columns.values[i])

# plot a graph with a few features vs precipitation to observe the trends
plt.show()

print('python')