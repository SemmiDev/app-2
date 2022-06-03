import { useEffect, useState } from 'react';
import './App.css';

const URL = 'https://api.adviceslip.com/advice';

function App() {
  const [advice, setAdvice] = useState('');
  const fetchAdvice = () => {
    fetch(URL)
      .then(response => response.json())
      .then(data => {
        setAdvice(data.slip.advice);
      }
      );
  }
  useEffect(() => {fetchAdvice()}, []);

  return (
    <div className="app">
      <div className="card">
        <h1 className="heading">{advice}</h1>
        <button className="button" onClick={() => {
          fetchAdvice();
        }}>
          <span>GIVE ME ADVICE!</span>
        </button>
      </div>
    </div>
  );
}

export default App;
