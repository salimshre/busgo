import React from "react"
import logosalim from '../../assets/main-icon.png';

const Header = () => {
  return (
    <div className="w-full text-sm bg-white">
      <div className="px-4 md:px-8">
        <div className="max-w-screen-xl mx-auto flex justify-between items-center py-3">
            {/*left part*/}
            <div className="flex items-center space-x-4"> </div>
            
            <img src={logosalim} alt="logo" className="h-8 object-contain cursor-pointer"/>

        </div>
      </div>
      {/*bottom nav bar*/}
    </div>
    
  )
}

export default Header