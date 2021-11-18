import React from 'react';
import { inject, observer } from 'mobx-react';
import { StoresNames } from '@/stores/StoresNames';
import ModalBox from '@/components/System/ModalBox';
import ProductStore from '@/stores/ProductStore';

interface BasketDialogProps {
    open: boolean;
    onClose: () => void;
}

function BasketDialog(props: BasketDialogProps) {
  const store = props[StoresNames.ProductStore] as ProductStore;

  return (
    <ModalBox show={props.open} title="Корзина" closeDialog={() => props.onClose()}>
      <div className="d-flex w-100 flex-column">
        {store.productsInBasket.map((product, index) => (
          <div key={index} className="product-card w-100 mb-3">
            <div className="product-card__wrapper card-body">
              <h5 className="card-title">{product.name}</h5>
              <p className="card-text mb-1">{product.substanceName}</p>
              <p className="card-text">{product.substanceCode}</p>
            </div>
            <div className="product-card__button-group pr-4 pt-2">
              <button
                className="btn btn-sm delete"
                onClick={() => {
                  store.removeFromBasket(product);
                }}
              >
                <i className="bi bi-x-lg" />
              </button>
            </div>
          </div>
        ))}
      </div>

    </ModalBox>
  );
}

export default inject('services', StoresNames.ProductStore)(observer(BasketDialog));
