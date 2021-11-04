import React, { useEffect, useRef, useState } from 'react';
import './HomePage.scss';
import { inject, observer } from 'mobx-react';
import { withRouter } from 'react-router-dom';
import { useTranslation } from 'react-i18next';
import CircularProgress from '@material-ui/core/CircularProgress';
import { IconButton, TextField } from '@material-ui/core';
import ProductDialog from '@pages/HomePage/components/ProductDialog';
import SearchIcon from '@material-ui/icons/Search';
import ProductModel from '@/model/ProductModel';
import { StoresNames } from '@/stores/StoresNames';
import ContentLoader from '@/components/System/ContentLoader/ContentLoader';
import ProductStore from '@/stores/ProductStore';


const HomePage: React.FC<{ services: any }> = (props) => {
  const { t } = useTranslation();
  const [isFetching, setIsFetching] = useState(true);
  const [searchProduct, setSearchProduct] = useState('');
  const [activeProduct, setActiveProduct] = useState<ProductModel | null>(null);
  const [productMode, setProductMode] = useState<'create' | 'update' | null>(null);
  const productStore = props[StoresNames.ProductStore] as ProductStore;

  useEffect(() => {
    if (isFetching) {
      props.services.productService.loadProduct().finally(() => {
        setIsFetching(false);
      });
    }
  }, [isFetching]);

  useEffect(() => {
    document.addEventListener('scroll', scrollHandler);

    return () => {
      document.removeEventListener('scroll', scrollHandler);
      productStore.clearProducts();
    };
  }, []);

  const scrollHandler = (e: Event) => {
    if (!productStore.products || productStore.products.length >= productStore.count) return;
    const loaderElement = document.querySelector('.home-page__loader');
    if (!loaderElement) return;
    const loaderElementTop = loaderElement.getBoundingClientRect().top;
    if (loaderElementTop - window.innerHeight < 30) {
      setIsFetching(true);
    }
  };

  const addToCard = (product) => {
    productStore.addInBasket(product);
  };

  const { products } = productStore;
  return (
    <div className="home-page">
      <div className="mb-3 d-flex justify-content-between align-items-end">
        <div className="d-flex ">
          <h4>{t('homePage.products')}</h4>
          <button
            className="btn ml-3"
            onClick={() => setProductMode('create')}
          >
            Создать
          </button>
        </div>
        <div className="home-page__search">
          <form
            onSubmit={(e) => {
              e.preventDefault();
              props.services.productService.searchProduct(searchProduct);
            }}
            className="d-flex align-items-center"
          >
            <TextField
              label="Найти продукт"
              variant="standard"
              size="small"
              value={searchProduct}
              onChange={(e) => setSearchProduct(e.target.value)}
              InputLabelProps={{ required: false }}
            />
            <IconButton
              type="submit"
            >
              <SearchIcon />
            </IconButton>
          </form>
        </div>
      </div>
      <div className="row">
        {
          !products
            ? [...Array(12).keys()].map((value) => (
              <div key={value} className="product-card col-12 col-sm-6 col-lg-4 mb-3">
                <ContentLoader />
              </div>
            ))
            : (
              <>
                {
                  products.map((product) => (
                    <div key={product.id} className="product-card col-12 col-sm-6 col-lg-4 mb-3">
                      <div className="product-card__wrapper card-body">
                        <h5 className="card-title">{product.name}</h5>
                        <p className="card-text mb-1">{product.substanceName}</p>
                        <p className="card-text">{product.substanceCode}</p>
                        <div className="d-flex justify-content-end">
                          <button to="/" className="btn btn-primary" onClick={event => { addToCard(product); }}>Добавить в корзину</button>
                        </div>
                      </div>
                      <div className="product-card__button-group pr-4 pt-2">
                        <button
                          className="btn btn-sm mr-2 edit"
                          onClick={() => {
                            setProductMode('update');
                            setActiveProduct(product);
                          }}
                        >
                          <i className="bi bi-pencil-fill" />
                        </button>
                        <button
                          className="btn btn-sm delete"
                          onClick={() => {
                            props.services.productService.deleteProduct(product.id);
                          }}
                        >
                          <i className="bi bi-x-lg" />
                        </button>
                      </div>
                    </div>
                  ))
                }
                {
                  productStore.products.length < productStore.count
                && (
                  <div className="home-page__loader d-flex justify-content-center w-100 m-3">
                    <CircularProgress size={30} />
                  </div>
                )
                }
              </>
            )
        }
      </div>
      <ProductDialog
        closeDialog={() => {
          setProductMode(null);
          setActiveProduct(null);
        }}
        mode={productMode}
        product={activeProduct}
      />
    </div>
  );
};

export default withRouter(inject(StoresNames.ProductStore, 'services')(observer(HomePage)));
