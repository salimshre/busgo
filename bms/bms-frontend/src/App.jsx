import { Routes, Route } from 'react-router-dom';
import Header from './components/shared/Header';
import Footer from './components/shared/Footer';
import Home from './pages/Home';
import Bus from './pages/bus';
import BusDetails from './pages/BusDetails';
function App() {

  return (
    <>
       <Header />
       <div className='flex flex-col min-h-screen'>
        <main className='flex-grow'>
          <Routes>
            <Route path="/" element={<Home />} />
            
            <Route path="/profile/:id" element={<h1>Profile Page</h1>} />
            <Route path="/bus" element={<Bus />} />
            <Route path="/bus/:busId" element={<BusDetails />} />
          </Routes>
        </main>
        <Footer />
      </div>
    </>
  )
}

export default App
