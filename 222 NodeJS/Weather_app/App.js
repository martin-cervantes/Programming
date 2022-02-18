require('dotenv').config()
const axios = require('axios');

const url = `http://api.weatherstack.com/current?access_key=${process.env.API_KEY}&query=New York`;

axios.get(url)
  .then(response => {
    const { weather_descriptions, temperature, humidity } = response.data.current;
    console.log(`${weather_descriptions[0]}. It's currently ${temperature} degrees out. There is ${humidity}% humidity.`);
  });
