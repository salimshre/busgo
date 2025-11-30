import BannerSlider from '../components/shared/BannerSlider';
import BusFilters from '../components/bus/busFilters';
import BusList from '../components/bus/BusList';

const Bus = () => {
  return (
    <div>
      <BannerSlider/>
      <div className='flex flex-col md:flex-row bg-[#f5f5f5] min-h-screen md:px-[100px] pb-10 pt-8'>
        <BusFilters />
        <BusList />
      </div>
    </div>
  );
};

export default Bus;