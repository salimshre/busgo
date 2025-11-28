import { languages } from '../../utils/constants';

const BusFilters = () => {
  return (
    <div className='w-full md:w-1/4 p-4 space-x-6'>
      <h2 className='text-2xl font-semibold'>Filters</h2>

      {/* Language */}
      <div className='bg-white p-4 rounded-md'>
        <div className='flex justify-between items-center mb-2'>
          <span className='font-medium'>Languages</span>
          <button className='text-[#f74362]'>Clear</button>
        </div>

        
          {/* language options placeholder */}
        </div>

        <div className='flex flex-wrap gap-2'>
            {
                languages.map((language, i) => (
                    <span className='border border-gray-200 
                    text-[#f74362] px-3 py-1 text-sm rounded
                    hover:bg-gray-100 cursor-pointer'>
                    {language}
                    </span>
                ))
            }

        </div>



      </div>
  );
};

export default BusFilters;
