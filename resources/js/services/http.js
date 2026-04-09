import axios from 'axios'

const http = axios.create({
  baseURL: 'https://your-backend.onrender.com/api',
  headers: {
    'Accept': 'application/json',
    'Content-Type': 'application/json'
  }
})

export default http