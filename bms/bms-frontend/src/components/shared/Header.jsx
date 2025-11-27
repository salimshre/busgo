import logosalim from '../../assets/main-icon.png';
import { FaSearch } from 'react-icons/fa';
import map from '../../assets/pin.gif';
import { useLocation } from '../../context/LocationContext';

const Header = () => {

  const { location, loading, error } = useLocation();

  return (
    <div className="w-full text-sm bg-white">
      {/*top nav bar*/}
      <div className="px-4 md:px-8">
        <div className="max-w-screen-xl mx-auto flex justify-between items-center py-3">
            {/*left part*/}
            <div className="flex items-center space-x-4"> </div>
            <img src={logosalim} alt="logo" className="h-8 object-contain cursor-pointer"/>
       

        <div className='relative'>
          <input type='text' 
          placeholder='search for bus, events, tickets, activities' 
          className='border border-gray-300 rounded px-4 py-1.5 w-[400px] text-sm outline-none'
          />
          <FaSearch className='absolute right-2 top-2.5 text-gray-500'/>
        </div>
        
        
        {/*right part*/}
        <div className='flex items-center space-x-6'>
          <div className='text-sm font-medium cursor-pointer mt-2'>
            {location && <img src={map} alt="loading..." className='w-10 h-10' />}
            {location && <p>{location} &nbsp; </p>}
          </div>
          <button className='bg-[#f84464] cursor-pointer text-white px-4 py-1.5 rounded-md text-sm font-medium hover:bg-[#f84464]/90 transition'>
            Sign In
          </button>

          </div>
        </div>
        



      </div>
      {/*bottom nav bar*/}
      <div className='bg-[#f2f2f2] px-4 md:px-8'>
        <div className='max-w-screen-xl mx-auto flex justify-between items-center py-2 
        text-gray-700'>
          <div className='flex items-center space-x-6 font-medium'>
            <span className='cursor-pointer hover:text-red-500'>bus</span>
            <span className='cursor-pointer hover:text-red-500'>place</span>
            <span className='cursor-pointer hover:text-red-500'>events</span>
            <span className='cursor-pointer hover:text-red-500'>plays</span>
            <span className='cursor-pointer hover:text-red-500'>sports</span>
            <span className='cursor-pointer hover:text-red-500'>activities</span>
          </div>

          <div className="flex item-center space-x-6 text-sm">
            <span className='cursor-pointer hover:underline'>listYourBuse</span>
            <span className='cursor-pointer hover:underline'>offers</span>
            <span className='cursor-pointer hover:underline'>gift card</span>
            <span className='cursor-pointer hover:underline'>listYourBuss</span>
            
          </div>
        </div>
      </div>

    </div>
    
  )
}

export default Header