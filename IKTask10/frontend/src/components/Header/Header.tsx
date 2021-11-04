import React, { useState } from 'react';
import { inject, observer } from 'mobx-react';
import { useTranslation } from 'react-i18next';
import './Header.scss';
import { Link } from 'react-router-dom';
import { ButtonGroup, DropdownButton, Dropdown } from 'react-bootstrap';
import { Badge, IconButton } from '@material-ui/core';
import { ShoppingCart } from '@material-ui/icons';
import { StoresNames } from '@/stores/StoresNames';
import ProductStore from "@/stores/ProductStore";

const Header = (props: { services?: any }) => {
  const { t, i18n } = useTranslation();

  const store = props[StoresNames.ProductStore] as ProductStore;

  const changeLanguage = (language: string) => {
    i18n.changeLanguage(language);
  };

  const logout = () => {
    props.services.authService.logout();
  };

  return (
    <header className="header d-flex align-items-center fixed-top">
      <div className="container align-items-center">
        <div className="d-flex align-items-center h-100">
          <Link to="/" className="d-flex align-items-center header__logo">
            <div className="header__logo-box d-flex align-items-center justify-content-center">
              <h2 className="header__logo-h2 m-0">HT</h2>
            </div>
            <h4 className="header__logo-h4 text-white ml-2 m-0">HackTemplate</h4>
          </Link>
          <div className="ml-auto d-flex align-items-center h-100">
            <IconButton>
              <Badge badgeContent={store.productsInBasket.length} color="error">
                <ShoppingCart style={{ color: 'white' }} />
              </Badge>
            </IconButton>

            <DropdownButton
              variant="outlined text-white pr-0"
              as={ButtonGroup}
              title={props[StoresNames.UserStore].user.email}
            >
              <Dropdown.Item
                onClick={() => {
                }}
              >
                Личный кабинет
              </Dropdown.Item>
              <Dropdown.Divider />
              <Dropdown.Item
                onClick={logout}
              >
                Выйти
              </Dropdown.Item>
            </DropdownButton>
          </div>
        </div>
      </div>
    </header>
  );
};

export default inject('services', StoresNames.UserStore, StoresNames.ProductStore)(observer(Header));
