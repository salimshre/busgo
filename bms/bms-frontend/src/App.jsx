import { Routes, Route } from 'react-router-dom';
import Header from './components/shared/Header';
import Footer from './components/shared/Footer';
import Home from './pages/Home';

function App() {

  return (
    <>
       <Header />
       <div className='flex flex-col min-h-screen'>
        <main className='flex-grow'>
         
          <Routes>
            <Route path="/" element={<Home />} />
            
            <Route path="/profile/:id" element={<h1>Profile Page</h1>} />
            <Route path="/bus" element={<h1>Bus Page</h1>} />
          </Routes>
        </main>
        <Footer />

      </div>
      
    </>
  )
}

export default App
