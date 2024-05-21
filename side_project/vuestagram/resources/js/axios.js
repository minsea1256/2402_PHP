import axios from 'axios';

const axiosInstance = axios.create({
    // baseURL: 'http://112.222.157.156:6006', // 기본 URL 설정

    // 기본 해더 설정
    headers: {
        'Content-Type': 'application/json'
    }
});

export default axiosInstance;